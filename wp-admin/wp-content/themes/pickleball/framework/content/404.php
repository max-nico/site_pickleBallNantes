<div class="wrap-content page-404">
          <h1 class="error-404"><span><?php esc_html_e( 'Oops, 404 Error', 'insomnia' ); ?></span></h3>
          <!-- <div class="content-404">
            <p>
              <?php //esc_html_e( 'It seems I can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'insomnia' ); ?>
            </p>
          </div>.entry-content -->
          <canvas id="canvas"></canvas>
        </div>
        <script>
        const canvas = document.getElementById('canvas')
const context = canvas.getContext('2d')
let dpi = window.devicePixelRatio;
//fix pixelated element
function fix_dpi() {
    //get CSS height
    //the + prefix casts it to an integer
    //the slice method gets rid of "px"
    let style_height = +getComputedStyle(canvas).getPropertyValue("height").slice(0, -2);
    //get CSS width
    let style_width = +getComputedStyle(canvas).getPropertyValue("width").slice(0, -2);
    //scale the canvas
    canvas.setAttribute('height', style_height * dpi);
    canvas.setAttribute('width', style_width * dpi);
}
fix_dpi()

let dt = 1;
let gravity = 1;
let restitution = 0.9;
console.log(restitution);


let variables = {
    ball: {
        radius: 15,
        x: /*canvas.width / 2*/15,
        y: 15,
        vx: 20,
        vy: 0
    }
}


class Circle {
    constructor(x, y, radius, startAngle, endAngle, color) {
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.startAngle = startAngle;
        this.endAngle = endAngle;
        this.color = color;
    }
    draw() {
        context.beginPath();
        context.arc(this.x, this.y, this.radius, this.startAngle, this.endAngle);
        context.fillStyle = this.color;
        context.stroke();
    }
}

class Text {
    constructor(text, x, y, maxWidth, font, fontSize, color) {
        this.text = text;
        this.x = x;
        this.y = y;
        this.maxWidth = maxWidth;
        this.font = font;
        this.color = color;
        this.fontSize = fontSize;
    }
    draw() {
        context.fillText(this.text, this.x, this.y, this.maxWidth);
        context.font = `${this.fontSize}px ${this.font}`;
        context.fillStyle = `${this.color}`;
    }
}
const ball = new Circle(variables.ball.x, variables.ball.y, variables.ball.radius, 0, Math.PI * 2, "#000")
let logDt = new Text(`dt : ${dt}`, 10, 25, 300, "Arial", 16, "#111")
let logGravity = new Text(`gravity : ${gravity}`, 10, 50, 300, "Arial", 16, "#122")
let logRestit = new Text(`restitution : ${restitution}`, 10, 75, 300, "Arial", 16, "#123")


let collideWorld = () => {
    if (ball.x < variables.ball.radius) {
        ball.x = variables.ball.radius
        variables.ball.vx *= -restitution;  
    }
    if (ball.x > canvas.width - variables.ball.radius) {
        ball.x = canvas.width - variables.ball.radius
        variables.ball.vx *= -restitution;
    }
    if (ball.y < variables.ball.radius) {
        ball.y = variables.ball.radius
        variables.ball.vy *= -restitution;
    }
    if (ball.y > canvas.height - variables.ball.radius) {
        ball.y = canvas.height - variables.ball.radius
        variables.ball.vy *= -restitution;
    }
}

//
let update = () => {
    variables.ball.vy += gravity * dt;
    ball.x += variables.ball.vx * dt
    ball.y += variables.ball.vy * dt
    collideWorld()
}

let draw = () => {
    context.clearRect(0, 0, canvas.width, canvas.height);
    ball.draw()
    logDt.draw()
    logRestit.draw()
    logGravity.draw()
}

let animate = () => {
    draw()
    update()
    requestAnimationFrame(animate)
}
requestAnimationFrame(animate)
        </script>
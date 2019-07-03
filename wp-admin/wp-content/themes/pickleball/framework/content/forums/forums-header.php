<div class="col-md-12">
            <div class="bkimg-forums-header col-md-12">
                <div class="img-bk-forums">
                <?php 
                $image = get_field('forums_header_image', 3662);
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }
                ?>
                   <div class="txt-forums-header">
                    <?php echo the_field('forums_header_text', 3662); ?>
                    </div>
                </div>
                 
                
          </div>      
</div>
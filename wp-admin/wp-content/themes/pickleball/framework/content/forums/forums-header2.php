   <div class="container-fluid main-forums">
       <?php $forum_page=is_archive('forums') ;?>
        <?php if ($forum_page) {?>
            <div class="row-fluid col-lg-12 justify-content-center ">
                <?php get_template_part( 'framework/content/forums/forums-header'); ?>
            </div>
        <?php }; ?>

        <div class="row-fluid col-lg-12 justify-content-center ">
            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-4 forum-block" id="forumscountblock">
                    <div class="roundboxforums circleforum">
                    <div class="countnumbers">
  
                    </div>
                    <div class="bbp-forum-topic-count titlecount"><?php echo _e( 'Forums', 'bbpress' ); ?>
                    </div>
                        <span class="iconforum">
                      <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/post.svg'; ?>" alt="icons forums">
                    </span>
            </div>
        </div>        
            <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-4 forum-block" id="sujetscountblock">
                <div class="roundboxforums circlesujets">
                <div class="countnumbers"><?php bbp_forum_topic_count(); ?>
                </div>
                <div class="bbp-forum-topic-count titlecount"><?php _e( 'Topics', 'bbpress' ); ?>
                </div>
                    <span class="iconsujets">
                    <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/topics.svg'; ?>" alt="icons topics">
                    </span>
                </div>
                
            </div>
            <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-2 col-xs-4 forum-block" id="responsescountblock">
                <div class="roundboxforums circleresponse">

                <div><?php // bbp_forum_replies_count(); ?>
                </div>
                <div class="bbp-forum-topic-count titlecount"><?php echo _e( 'Reponses', 'bbpress' ); ?>
                </div>
                    <span class="iconresponse">
                    <img src="<?php  echo get_stylesheet_directory_uri() . '/assets/images/replies.svg'; ?>" alt="icons responses">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
   /* var countc=0;
    var counta=0;
    var countc = ("loop-item-0").length;
    var counta = (".bbp-forum-title").length;
    console.log(countc);
    console.log(counta);
    var div = document.getElementById("myDIV");
    var nodelist = div.getElementsByTagName("P");
    var i;
    for (i = 0; i < nodelist.length; i++) {
        nodelist[i].style.backgroundColor = "red";
        }*/

    const forums = document.querySelectorAll('.bbp-forum-status-open');
    forums.forEach(element => {
        console.log(element);
    });
    </script>
    
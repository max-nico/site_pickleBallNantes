<?php
/*TEAM  MEMBER*/
add_shortcode('vc_team_member', 'vc_team_member_f');
function vc_team_member_f($atts, $content = null) {
	extract(shortcode_atts( array(
	'image'=> get_template_directory_uri().'/assets/img/no_image.png',
	'name'=> 'Mark Pau',
	'position'=>'Smart programmer',
   'tw_url'=>'',
   'inst_url'=>'',
   'tm_url'=>'',
   'drop_url'=>'',
   'drib_url'=>'',
	), $atts));
	


    if ($tw_url == ''){$tw ='';} else { $tw = '<li><a target="_blank" href="'.$tw_url.'"><i class="ti-twitter"></i></a>';};
    if ($inst_url == ''){$inst ='';} else { $inst = '<li><a target="_blank" href="'.$inst_url.'"><i class="ti-instagram"></i></a>';};
    if ($tm_url == ''){$tm ='';} else { $tm = '<li><a target="_blank" href="'.$tm_url.'"><i class="ti-tumblr"></i></a>';};
    if ($drop_url == ''){$dp ='';} else { $dp = '<li><a target="_blank" href="'.$drop_url.'"><i class="ti-dropbox"></i></a>';};
    if ($drib_url == ''){$db ='';} else { $db = '<li><a target="_blank" href="'.$drib_url.'"><i class="ti-dribbble"></i></a>';};

	 

	 $ulrs = ''.$tw.''.$inst.''.$tm.''.$dp.''.$db.'';

	 $image_done = wp_get_attachment_image($image,'full img-responsive');
	 
	 $code = '<div class="team-image">
                    '.$image_done.'
                  </div>
                  <div class="team-block">
                    <div class="about-name">'.$name.'</div>
                    <div class="about-desc">'.$position.'</div>
                    <ul class="soc-about">
                    '.$ulrs.'
                    </ul>
                  </div>';

	return $code;
};


vc_map( array(
   "name" => __("Team Member",'insomnia'),
   "base" => "vc_team_member",
   "category" => __('Insomnia','insomnia'),
   "params" => array(
	  array(
         "type" => "attach_image",
         "heading" => __("Member Photo",'insomnia'),
         "param_name" => "image",
         "value" => '',
         "admin_label" => true,
      ),
	  array(
         "type" => "textfield",
         "heading" => __("Name",'insomnia'),
         "param_name" => "name",
         "value" => __("Mark Pau",'insomnia'),
         "admin_label" => true,
      ),
	  array(
         "type" => "textfield",
         "heading" => __("Position in company",'insomnia'),
         "param_name" => "position",
         "value" => __("Smart programmer",'insomnia'),
         "admin_label" => true,
      ),
	  array(
         "type" => "textfield",
         "heading" => __("Twitter",'insomnia'),
         "param_name" => "tw_url",
         "value" => '',
          "admin_label" => true,
      ),
	   array(
         "type" => "textfield",
         "heading" => __("Instagram",'insomnia'),
         "param_name" => "inst_url",
         "value" => '',
          "admin_label" => true,
      ),
	   array(
         "type" => "textfield",
         "heading" => __("Tumblr",'insomnia'),
         "param_name" => "tm_url",
         "value" => '',
          "admin_label" => true,
      ),
	   array(
         "type" => "textfield",
         "heading" => __("Dropbox",'insomnia'),
         "param_name" => "drop_url",
         "value" => '',
          "admin_label" => true,
      ),
	   array(
         "type" => "textfield",
         "heading" => __("Dribbble",'insomnia'),
         "param_name" => "drib_url",
         "value" => '',
          "admin_label" => true,
      ),
   )
) );


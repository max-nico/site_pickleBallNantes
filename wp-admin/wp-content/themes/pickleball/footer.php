<?php if(get_theme_mod('insomnia_sticky_footer') == true)  { ?>
	</div></div><?php get_template_part( 'framework/content/footer');?>
	<?php } else  { ?>
	</div><?php get_template_part( 'framework/content/footer');?></div>
<?php } ?>  
<?php wp_footer(); ?>
</body>
</html>
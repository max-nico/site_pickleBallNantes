<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $the_fields = array('section_1','section_2' ,'section_3' ,'section_4', 'section_5', 'section_6', 'section_7', 'section_8'); ?>
    <?php foreach ($the_fields as $key => $value): ?>
        <div class="field-learning my-4">
            <?php the_field($value); ?>
        </div>
    <?php endforeach; ?>
<?php endwhile; endif; ?>
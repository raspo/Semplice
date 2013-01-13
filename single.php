<?php get_header(); ?>

<section class="articles single">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'templates/content', 'single' ); ?>

    <?php endwhile; ?>

</section><!-- articles close -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
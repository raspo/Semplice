<?php get_header(); ?>

<section class="articles page">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'templates/content', 'page' ); ?>

    <?php endwhile; ?>

</section><!-- articles close -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
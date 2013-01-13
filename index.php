<?php get_header(); ?>

<section class="articles">

    <?php if( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'templates/content', get_post_format() ); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <?php get_template_part( 'no-results', 'index' ); ?>

    <?php endif; ?>

</section><!-- articles close -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
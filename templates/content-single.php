<div class="article-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="article-header">
            <h1 class="article-title"><?php the_title(); ?></h1>
        </header>
        <div class="article-content">
            <?php the_content(); ?>
        </div><!-- .article-content -->
    </article>

    <?php
    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() != '0' ){
        comments_template( '', true );
    }
    ?>
</div><!-- .article-container -->
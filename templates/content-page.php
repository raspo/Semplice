<div class="article-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="article-header">
            <h1 class="article-title"><?php the_title(); ?></h1>
        </header>
        <div class="article-content">
            <?php the_content(); ?>
        </div><!-- .article-content -->
    </article>
</div><!-- .article-container -->
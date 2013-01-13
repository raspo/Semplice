<div class="article-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="article-header">
            <h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <div class="article-content">
            <?php the_content('- Read More -'); ?>
        </div><!-- .article-content -->
    </article>
</div><!-- .article-container -->
<?php

/**
 * Enqueue scripts and styles
 */
function semplice_srcipts_and_styles() {

    // the main stylesheet
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // the main script file
    wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/scripts.min.js', array( 'jquery' ) );

    // the comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'semplice_srcipts_and_styles' );


/**
 * sets up theme defaults and registers support for various WordPress features
 */
function semplice_add_features() {

    // include required files
    // require( get_template_directory() . '/inc/somefile.php' );

    //Add post-thumbnails and image sizes
    add_theme_support( 'post-thumbnails' );

    if( function_exists( 'add_image_size' ) ){
        add_image_size( 'blog_full', 960, 0, false );
    }

    // Enable the custom menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'semplice' ),
    ) );

    // enable support for Post Formats
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

    // add localization
    load_theme_textdomain( 'semplice', get_template_directory() . '/lang' );

    // Clean up the <head> section
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');

    // add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

}
add_action('after_setup_theme', 'semplice_add_features' );


/**
 * Register widgetized area
 */
function semplice_widgets_init() {
    register_sidebar(array(
        'name'          => __( 'Sidebar Widgets', 'semplice' ),
        'id'            => 'sidebar-widgets',
        'description'   => __( 'These are widgets for the sidebar.', 'semplice' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widgetTitle"><h4>',
        'after_title'   => '</h4></div>'
    ));
    register_sidebar(array(
        'name'          => __( 'Footer Widgets', 'semplice' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'These are widgets for the sidebar.', 'semplice' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widgetTitle"><h4>',
        'after_title'   => '</h4></div>'
    ));
}
add_action( 'widgets_init', 'semplice_widgets_init' );


/**
 * custom comment diplay output
 */
function semplice_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class('cf'); ?> id="li-comment-<?php comment_ID() ?>">
        
        <div class="comment-block" id="comment-<?php comment_ID(); ?>">
            <div class="comment-info">  
                <div class="comment-author">
                    <?php echo get_avatar( $comment->comment_author_email, 75 ); ?>
                    
                    <div class="comment-meta">
                        <?php echo get_comment_author_link(); ?>
                        <span class="comment-time"></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="comment-text">
                <?php comment_text() ?>
                <p class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </p>
            </div>
        
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'semplice') ?></em>
            <?php endif; ?>    
        </div>
    </li>
<?php
}

function semplice_comment_form_fields($fields){

    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    
    $fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name *', 'semplice' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="Your Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email">' . '<label for="email">' . __( 'Your Email *', 'semplice' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" placeholder="Your Email *" value="' . esc_attr( $commenter['comment_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url">' . '<label for="url">' . __( 'Your Website', 'semplice' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="url" name="url" type="text" placeholder="Your Website" value="' . esc_attr( $commenter['comment_url'] ) . '" size="30"' . $aria_req . ' /></p>';

    return $fields;
}
add_filter('comment_form_default_fields','semplice_comment_form_fields');


function semplice_cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<div id="cancel-comment-reply-link"' . $style . '>';
    return $button . '<i class="icon-remove-sign"></i> </div>';
}
 
add_action('cancel_comment_reply_link', 'semplice_cancel_comment_reply_button', 10, 3);
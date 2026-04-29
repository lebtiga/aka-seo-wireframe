<?php
/**
 * AKA Framework Theme Functions
 *
 * @package AKA_Framework
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function aka_framework_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'aka-framework' ),
        'footer'  => __( 'Footer Menu', 'aka-framework' ),
    ) );
}
add_action( 'after_setup_theme', 'aka_framework_setup' );

/**
 * Enqueue Styles and Scripts
 */
function aka_framework_scripts() {
    // Main stylesheet
    wp_enqueue_style( 
        'aka-framework-style', 
        get_stylesheet_uri(),
        array(),
        '1.0.0'
    );
    
    // Mobile responsive
    wp_add_inline_style( 'aka-framework-style', '
        @media (max-width: 768px) {
            body { font-size: 16px; }
        }
    ' );
}
add_action( 'wp_enqueue_scripts', 'aka_framework_scripts' );

/**
 * Register Page Templates
 */
function aka_framework_page_templates( $templates ) {
    $templates['page-authority-hub.php'] = 'Authority Hub';
    $templates['page-knowledge.php'] = 'Knowledge Page';
    $templates['page-answer.php'] = 'Answer Page';
    
    return $templates;
}
add_filter( 'theme_page_templates', 'aka_framework_page_templates' );

/**
 * Get Hub Navigation - Lists all child pages
 */
function aka_get_hub_navigation( $parent_id = 0 ) {
    if ( ! $parent_id ) {
        $parent_id = get_the_ID();
    }
    
    // Get child pages
    $children = get_pages( array(
        'child_of'    => $parent_id,
        'sort_column' => 'menu_order, post_title',
        'post_status' => 'publish'
    ) );
    
    if ( empty( $children ) ) {
        return '';
    }
    
    // Group by template type
    $knowledge_pages = array();
    $answer_pages = array();
    
    foreach ( $children as $child ) {
        $template = get_page_template_slug( $child->ID );
        
        if ( $template === 'page-knowledge.php' ) {
            $knowledge_pages[] = $child;
        } elseif ( $template === 'page-answer.php' ) {
            $answer_pages[] = $child;
        }
    }
    
    ob_start();
    ?>
    <div class="hub-sidebar">
        <?php if ( ! empty( $knowledge_pages ) ) : ?>
            <h3>Knowledge Base</h3>
            <ul>
                <?php foreach ( $knowledge_pages as $page ) : ?>
                    <li>
                        <a href="<?php echo get_permalink( $page->ID ); ?>">
                            <?php echo esc_html( $page->post_title ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        
        <?php if ( ! empty( $answer_pages ) ) : ?>
            <h3>Common Questions</h3>
            <ul>
                <?php 
                // Show first 10 answer pages
                $displayed = 0;
                foreach ( $answer_pages as $page ) : 
                    if ( $displayed >= 10 ) break;
                ?>
                    <li>
                        <a href="<?php echo get_permalink( $page->ID ); ?>">
                            <?php echo esc_html( $page->post_title ); ?>
                        </a>
                    </li>
                <?php 
                    $displayed++;
                endforeach; 
                ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Get Breadcrumbs
 */
function aka_get_breadcrumbs() {
    $breadcrumbs = array();
    
    // Add home
    $breadcrumbs[] = '<a href="' . home_url() . '">Home</a>';
    
    // Get ancestors
    $ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
    foreach ( $ancestors as $ancestor ) {
        $breadcrumbs[] = '<a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a>';
    }
    
    // Current page
    $breadcrumbs[] = '<span>' . get_the_title() . '</span>';
    
    return '<div class="breadcrumbs">' . implode( ' <span>&gt;</span> ', $breadcrumbs ) . '</div>';
}

/**
 * Get Related Topics (sibling pages)
 */
function aka_get_related_topics() {
    $parent_id = wp_get_post_parent_id( get_the_ID() );
    
    if ( ! $parent_id ) {
        return '';
    }
    
    // Get sibling pages (same parent, same template)
    $current_template = get_page_template_slug( get_the_ID() );
    
    $siblings = get_pages( array(
        'child_of'    => $parent_id,
        'exclude'     => get_the_ID(),
        'sort_column' => 'menu_order, post_title',
        'post_status' => 'publish'
    ) );
    
    // Filter by same template type
    $related = array();
    foreach ( $siblings as $sibling ) {
        if ( get_page_template_slug( $sibling->ID ) === $current_template ) {
            $related[] = $sibling;
        }
    }
    
    if ( empty( $related ) ) {
        return '';
    }
    
    ob_start();
    ?>
    <div class="related-topics">
        <h2>Related Topics</h2>
        <div class="topic-grid">
            <?php 
            // Show max 6 related topics
            $count = 0;
            foreach ( $related as $page ) : 
                if ( $count >= 6 ) break;
            ?>
                <div class="topic-card">
                    <h3>
                        <a href="<?php echo get_permalink( $page->ID ); ?>">
                            <?php echo esc_html( $page->post_title ); ?>
                        </a>
                    </h3>
                    <?php if ( $page->post_excerpt ) : ?>
                        <p><?php echo esc_html( $page->post_excerpt ); ?></p>
                    <?php endif; ?>
                </div>
            <?php 
                $count++;
            endforeach; 
            ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Get Related Questions (for Answer pages)
 */
function aka_get_related_questions() {
    $parent_id = wp_get_post_parent_id( get_the_ID() );
    
    if ( ! $parent_id ) {
        return '';
    }
    
    // Get other answer pages under same parent
    $answers = get_pages( array(
        'child_of'    => $parent_id,
        'exclude'     => get_the_ID(),
        'sort_column' => 'menu_order, post_title',
        'post_status' => 'publish'
    ) );
    
    // Filter to only Answer pages
    $related_answers = array();
    foreach ( $answers as $answer ) {
        if ( get_page_template_slug( $answer->ID ) === 'page-answer.php' ) {
            $related_answers[] = $answer;
        }
    }
    
    if ( empty( $related_answers ) ) {
        return '';
    }
    
    ob_start();
    ?>
    <div class="related-questions">
        <h2>Related Questions</h2>
        <ul>
            <?php 
            // Show first 5 related questions
            $count = 0;
            foreach ( $related_answers as $question ) : 
                if ( $count >= 5 ) break;
            ?>
                <li>
                    <a href="<?php echo get_permalink( $question->ID ); ?>">
                        <?php echo esc_html( $question->post_title ); ?>
                    </a>
                </li>
            <?php 
                $count++;
            endforeach; 
            ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Get CTA Box
 */
function aka_get_cta_box( $title = '', $description = '', $button_text = 'Contact Us', $button_url = '' ) {
    if ( ! $title ) {
        $title = 'Ready to Get Started?';
    }
    
    if ( ! $description ) {
        $description = 'Contact us today for a free consultation.';
    }
    
    if ( ! $button_url ) {
        $button_url = home_url( '/contact/' );
    }
    
    ob_start();
    ?>
    <div class="cta-box">
        <h3><?php echo esc_html( $title ); ?></h3>
        <p><?php echo esc_html( $description ); ?></p>
        <a href="<?php echo esc_url( $button_url ); ?>" class="cta-button">
            <?php echo esc_html( $button_text ); ?>
        </a>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Custom excerpt length
 */
function aka_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'aka_excerpt_length' );

/**
 * Custom excerpt more
 */
function aka_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'aka_excerpt_more' );

/**
 * Add page slug as body class
 */
function aka_body_classes( $classes ) {
    global $post;
    
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
        
        // Add template class
        $template = get_page_template_slug();
        if ( $template ) {
            $classes[] = str_replace( '.php', '', $template );
        }
    }
    
    return $classes;
}
add_filter( 'body_class', 'aka_body_classes' );

/**
 * Customizer Settings
 */
function aka_customize_register( $wp_customize ) {
    // Phone Number
    $wp_customize->add_setting( 'aka_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'aka_phone', array(
        'label'    => __( 'Phone Number', 'aka-framework' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );
    
    // Primary Color
    $wp_customize->add_setting( 'aka_primary_color', array(
        'default'           => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aka_primary_color', array(
        'label'    => __( 'Primary Color', 'aka-framework' ),
        'section'  => 'colors',
        'settings' => 'aka_primary_color',
    ) ) );
}
add_action( 'customize_register', 'aka_customize_register' );

/**
 * Output custom colors in head
 */
function aka_custom_colors() {
    $primary_color = get_theme_mod( 'aka_primary_color', '#2563eb' );
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr( $primary_color ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'aka_custom_colors' );

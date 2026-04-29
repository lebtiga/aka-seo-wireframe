<?php
/**
 * Template Name: Knowledge Page
 * Template for Knowledge pages in the AKA framework
 *
 * @package AKA_Framework
 */

get_header();
?>

<div class="knowledge-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            
            // Display breadcrumbs
            echo aka_get_breadcrumbs();
            ?>
            
            <div class="page-header">
                <h1><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?>
                    <div class="page-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="content-area">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                
                <?php
                // Display related topics (sibling Knowledge pages)
                echo aka_get_related_topics();
                
                // Display CTA
                echo aka_get_cta_box(
                    'Need Professional Help?',
                    'Get in touch with us today for expert guidance.',
                    'Contact Us'
                );
                ?>
            </div>
            
            <?php
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();

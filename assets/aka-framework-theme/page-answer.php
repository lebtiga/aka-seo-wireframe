<?php
/**
 * Template Name: Answer Page
 * Template for Answer/FAQ pages in the AKA framework
 * Optimized for featured snippets
 *
 * @package AKA_Framework
 */

get_header();
?>

<div class="answer-page">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            
            // Display breadcrumbs
            echo aka_get_breadcrumbs();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                
                <?php
                // Extract first paragraph as "Quick Answer" if excerpt exists
                if ( has_excerpt() ) :
                ?>
                    <div class="quick-answer">
                        <h2>Quick Answer</h2>
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="answer-content entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            
            <?php
            // Display related questions
            echo aka_get_related_questions();
            
            // Display CTA
            echo aka_get_cta_box(
                'Have More Questions?',
                'Contact us for personalized answers to your specific situation.',
                'Ask Us Now'
            );
            ?>
            
        <?php
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();

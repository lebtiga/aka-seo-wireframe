<?php
/**
 * Template Name: Authority Hub
 * Template for Authority Hub pages in the AKA framework
 *
 * @package AKA_Framework
 */

get_header();
?>

<div class="authority-hub">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        
        <div class="hub-header">
            <div class="container">
                <h1 class="hub-title"><?php the_title(); ?></h1>
                
                <?php if ( has_excerpt() ) : ?>
                    <div class="hub-description">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="trust-bar">
                    <span class="trust-item">⭐⭐⭐⭐⭐ Trusted by Clients</span>
                    <span class="trust-item">📞 Free Consultation</span>
                    <span class="trust-item">💼 Years of Experience</span>
                </div>
            </div>
        </div>
        
        <div class="container">
            <?php
            // Show Quick Navigation if this page has children
            $children = get_pages( array(
                'child_of'    => get_the_ID(),
                'post_status' => 'publish'
            ) );
            
            if ( ! empty( $children ) ) :
                // Group children by template
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
                ?>
                
                <div class="quick-nav">
                    <h2>Quick Navigation</h2>
                    
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
                            // Show first 10 questions
                            $count = 0;
                            foreach ( $answer_pages as $page ) : 
                                if ( $count >= 10 ) break;
                            ?>
                                <li>
                                    <a href="<?php echo get_permalink( $page->ID ); ?>">
                                        <?php echo esc_html( $page->post_title ); ?>
                                    </a>
                                </li>
                            <?php 
                                $count++;
                            endforeach; 
                            ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="content-area">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                
                <?php
                // Display CTA box at the end
                echo aka_get_cta_box(
                    'Ready to Get Started?',
                    'Contact us today for a free consultation.',
                    'Contact Us Now'
                );
                ?>
            </div>
        </div>
        
        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();

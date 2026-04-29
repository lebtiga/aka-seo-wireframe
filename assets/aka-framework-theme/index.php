<?php
/**
 * The main template file
 *
 * @package AKA_Framework
 */

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p><?php esc_html_e( 'No content found.', 'aka-framework' ); ?></p>
            <?php
        endif;
        ?>
    </div>
</div>

<?php
get_footer();

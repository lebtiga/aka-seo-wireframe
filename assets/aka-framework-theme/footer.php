    </main><!-- .site-content -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-widget">
                    <h3><?php bloginfo( 'name' ); ?></h3>
                    <p><?php bloginfo( 'description' ); ?></p>
                    <?php if ( get_theme_mod( 'aka_phone' ) ) : ?>
                        <p>
                            <strong>Phone:</strong> 
                            <a href="tel:<?php echo esc_attr( get_theme_mod( 'aka_phone' ) ); ?>">
                                <?php echo esc_html( get_theme_mod( 'aka_phone' ) ); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
                
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <div class="footer-widget">
                        <h3>Quick Links</h3>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        ) );
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="site-info">
                <p>
                    &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
                    <?php if ( function_exists( 'the_privacy_policy_link' ) ) : ?>
                        | <?php the_privacy_policy_link(); ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </footer>
</div><!-- .site-container -->

<?php wp_footer(); ?>

</body>
</html>

                <div class="container content-bottom area">
                        <div class="row">
                        <?php if ( is_active_sidebar( 'content-bottom1' )  ) : ?>
                                    <div id="bottom-widget1" class="bottom-widget widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'content-bottom1' ); ?>
                                    </div><!-- .sidebar .widget-area -->
                                <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="grid_12">
                                <?php if ( is_active_sidebar( 'content-bottom2' )  ) : ?>
                                    <div id="bottom-widget2" class="bottom-widget widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'content-bottom2' ); ?>
                                    </div><!-- .sidebar .widget-area -->
                                <?php endif; ?>

                            </div>
                        </div>
                        
                </div>
            </div><!--end bg1-->
            <footer class="footer">   
                <div class="container">
                    <div class="row  footer-top">
                      <?php if ( is_active_sidebar( 'footer1' )  ) : ?>
                                    <div id="footer1-widget" class="footer-widget widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer1'); ?>
                                    </div><!-- .sidebar .widget-area -->
                        <?php endif; ?>
                        <div class="clear"></div>
                    </div>
                    <div class="row ">
                     <?php if ( is_active_sidebar( 'footer2' )  ) : ?>
                                    <div id="footer2-widget" class="footer-widget widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer2'); ?>
                                    </div><!-- .sidebar .widget-area -->
                        <?php endif; ?>
                    </div>
                </div>  
            </footer>
        </div> 

<?php wp_footer(); ?>

</body>
</html>

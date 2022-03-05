<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <?php dynamic_sidebar('footer_one'); ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
            <?php dynamic_sidebar('footer_two'); ?>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                                                                            
                <?php echo do_shortcode('[contact-form-7 id="184" title="Newsletter"]');  ?>    
                
                    <div class="footer__widget__social">
                        <?php if ($footer_socials=get_field('footer_social', 'options')) {
    foreach ($footer_socials as $socials) { ?>
                        <a href="<?php echo $socials['icon_link']; ?>">
                            <i class="fa <?php echo $socials['icon_select']?>"></i>
                        </a>
                        <?php }
} ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p>
                            <?php the_field('copyright_text', 'options'); ?>
                        </p>
                    </div>
                    <div class="footer__copyright__payment">
                        <?php $fpay=get_field('footer_payment_picture', 'options'); ?>
                        <img src="<?php echo $fpay['url'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
<?php wp_footer();?>
</body>

</html>
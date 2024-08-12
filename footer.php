<?php
/* =================================================================
The template for displaying the footer
================================================================= */
?>

</div>
</main>

<style>
.footer-logo {
    grid-column: span 3;
}
    </style>

<footer class="footer">

    <img src="https://www.listandfound.co.uk/wp-content/uploads/2021/11/logo-white-footer-03.svg" alt="List & Found Logo" title="List & Found" class="footer-logo" />

    <div class="col-1">
        <h5><?php echo do_shortcode('[acf field="field_61e171d204f73" post_id="option"]'); ?></h5>

        <a href="tel:<?php echo do_shortcode('[acf field="field_61d4701c45dac" post_id="option"]'); ?>" class="underline"><?php echo do_shortcode('[acf field="field_61d4701c45dac" post_id="option"]'); ?></a><br /><br />
        <a href="mailto:<?php echo do_shortcode('[acf field="field_61d4702545dad" post_id="option"]'); ?>" class="underline"><?php echo do_shortcode('[acf field="field_61d4702545dad" post_id="option"]'); ?></a>

        <div class="social-links">
            <?php if( get_field('field_61d5c7eab6fa3', 'option') ): ?>
	            <a href="<?php echo do_shortcode('[acf field="field_61d5c7eab6fa3" post_id="option"]'); ?>" class="facebook" name="Facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if( get_field('field_61d5c805b6fa4', 'option') ): ?>
	            <a href="<?php echo do_shortcode('[acf field="field_61d5c805b6fa4" post_id="option"]'); ?>" class="twitter" name="Twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if( get_field('field_61d5c806b6fa5', 'option') ): ?>
	            <a href="<?php echo do_shortcode('[acf field="field_61d5c806b6fa5" post_id="option"]'); ?>" class="instagram" name="Instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if( get_field('field_61d5c808b6fa6', 'option') ): ?>
	            <a href="<?php echo do_shortcode('[acf field="field_61d5c808b6fa6" post_id="option"]'); ?>" class="linkedin" name="LinkedIn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>  
        </div>
    </div>
    <div class="col-2">
        <h5><?php echo do_shortcode('[acf field="field_61d4706a45db0" post_id="option"]'); ?></h5>
        <p><?php echo do_shortcode('[acf field="field_61d4706e45db1" post_id="option"]'); ?></p>
        <a href="https://www.google.com/maps/dir//list%26found/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x487bb10426a81e6d:0xc5811bb8d8159a4d?sa=X&ved=2ahUKEwjQs-728Zz1AhXNVsAKHX0lAbsQ9Rd6BAgvEAU">Get Directions</a>
    </div>
    <div class="col-3">
        <h5>Mailing List</h5>
        <?php echo do_shortcode( '[contact-form-7 id="451" title="Mailing List"]' ); ?>   
    </div>
</footer>

<div class="copyright">
    <div class="col-1">
        <p>&copy; <?php echo do_shortcode('[acf field="field_61d4708245db2" post_id="option"]'); ?>. Website by <a href="https://www.create8.co.uk" rel="nofollow" target="_blank" rel="noreferrer" style="margin-left:0;text-decoration:underline;">Create8</a></p>
    </div>
    <div class="col-2">
        <a href="https://www.listandfound.co.uk/cookie-policy/">Cookie Policy</a> <a href="https://www.listandfound.co.uk/privacy-policy/">Privacy Policy &amp; Terms of Use</a>
    </div>
</div>

<?php wp_footer(); ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
  })
</script>
</body>
</html>
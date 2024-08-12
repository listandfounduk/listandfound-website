<?php
/* =================================================================
The template for displaying all single posts
================================================================= */
get_header();
?>
	<?php
	while ( have_posts() ) : the_post(); ?>


<section class="grid image-left gradient">

    <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

  <div class="image" style="background-image:url(<?php echo $image[0]; ?>);"></div>

<?php endif; ?>

<div class="content">
    <div class="text-section">

        <h1 style="margin-bottom:30px;"><?php the_title(); ?></h1>

        <p><?php echo get_the_author_meta('display_name', $author_id); ?> / <?php echo get_the_date( 'd F Y' ); ?></p>
    </div>

    <div class="item-right width-12 bottom-offset absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>

</div>
</section>

        <article class="full-width-wrap single-post">
        <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
}
?>
            <?php the_content(); ?>
        </article>

		<?php /* If comments are open or we have at least one comment, load up the comment template. 
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;*/ ?>

<?php if( get_field('field_61d44cb44fb39') == 'yes' ) { ?>
<section class="grid image-left">
                <div class="image" style="background-image:url(<?php echo do_shortcode('[acf field="field_61d44dc3cca98"]'); ?>);"></div>
                
                <div class="content">
                    <div class="item-right width-1 top-inner absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>
                    <div class="text-section">
                    <h4>Case Study:</h4>
                        <a href="<?php echo do_shortcode('[acf field="field_61d44bc5def73"]'); ?>" class="underline"><h2><?php echo do_shortcode('[acf field="field_61d44b9cdef70"]'); ?></h2></a>
                        <p style="margin-top:30px;"><?php echo do_shortcode('[acf field="field_61d44ba8def71"]'); ?></p>

                        <a href="<?php echo do_shortcode('[acf field="field_61d44bc5def73"]'); ?>" class="btn"><span class="text-bg"></span><span class="text"><?php echo do_shortcode('[acf field="field_61d44bbcdef72"]'); ?></span></a>
                    </div>

                    <div class="item-right width-12 bottom-offset absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>
                </div>
            </section>

<?php } ?>

<section class="grid image-left footer-cta">

<div class="image profile no-min-height-mobile no-padding-top-bottom-mobile">

    <div class="item-right width-7 absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>
    <div class="item-right width-3 absolute" data-aos-delay="100" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>

    <img src="https://www.listandfound.co.uk/wp-content/uploads/2022/01/Chris-Founder-2-1.png" alt="team member image" title="Get in touch" />

    <div class="item-left width-10 absolute" data-aos-delay="125" data-aos-duration="500" data-aos-offset="50" data-aos="slide-right"></div>
</div>

<div class="content no-min-height-mobile ">
    <div class="text-section">
        <h3><a href="https://www.listandfound.co.uk/contact/">Get in touch</a></h3>
    </div>
</div>

<div class="item-right width-2 absolute" data-aos-delay="100" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left" style="min-height:50px;"></div>

</section>

	<?php endwhile; ?>



<?php
get_footer();
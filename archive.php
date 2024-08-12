<?php
/* =================================================================
The template for displaying all posts archive
================================================================= */
get_header();
?>

<section class="full-width-wrap">

    <h3 style="margin-bottom:30px;"><?php echo do_shortcode('[acf field="field_61d4385110b57" post_id="244"]'); ?></h3>

    <?php echo do_shortcode('[acf field="field_61d4385910b58" post_id="244"]'); ?> 
</section>

<?php 
if (have_posts()): while (have_posts()) : the_post(); 

?>
<?php        
    $category = get_the_category($post->ID);
    $category = $category[0]->cat_ID;
     $loop = new WP_Query(
       array(
          'post_type' => 'post',
          'posts_per_page' => get_option('posts_per_page'),     
          'paged' => $paged,
          'post_status' => 'publish',
          'orderby' => 'desc',
          'orderby' => 'date', // modified | title | name | ID | rand
          'category__in' => array($category),
            )
        );
    ?>


<article class="grid image-right post">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

  <div class="image" style="background-image:url(<?php echo $image[0]; ?>);"></div>

<?php endif; ?>
               
    
                <div class="content">
                    <div class="item-left width-1 top-inner absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-right"></div>
                        
                    <div class="text-section">
                            <h3 style="margin-bottom:30px;"><?php the_title(); ?></h3>
								<div class="date">
									<?php get_the_date()?>
						</div>

                            <p><?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?></p>

                        
                            <a href="<?php the_permalink() ?>" class="btn"><span class="text-bg"></span><span class="text">Read More..</span></a>
                      
                    </div>
                        
                    <div class="item-left width-12 bottom-offset absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-right"></div>

                </div>
</article>
    


<?php endwhile; ?>

<!-- Repeat the process and reset once it hits the limit-->
<div class="pagination">
  <?php if ($loop->max_num_pages > 1) : // custom pagination  ?>
    <?php
      $orig_query = $wp_query; // fix for pagination to work
      $wp_query = $loop;
      $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('page')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => __( 'Previous', 'textdomain' ),
	        'next_text' => __( 'Next', 'textdomain' ),
        ));                  
        $wp_query = $orig_query; // fix for pagination to work
    ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>  
</div>

<?php endif; ?>  


<?php
get_footer();
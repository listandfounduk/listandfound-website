<?php
/* =================================================================
The template for displaying all glossary single posts
================================================================= */
get_header();
?>

<section class="grid image-left gradient">

    <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

  <div class="image" style="background-image:url(<?php echo $image[0]; ?>);"></div>

<?php endif; ?>

<div class="content">
    <div class="text-section">

        <h1 style="margin-bottom:30px;"><?php the_title(); ?></h1>

        <?php if (has_excerpt()) : ?>
            <p><?php the_excerpt(); ?></p>
        <?php endif; ?>
    </div>

    <div class="item-right width-12 bottom-offset absolute" data-aos-delay="50" data-aos-duration="500" data-aos-offset="50" data-aos="slide-left"></div>

</div>
</section>


<section class="full-width-wrap text-unset">
    <div class="post-sidebar-container">
        <div class="post-sidebar-content-container">
            <?php the_content() ?>
        </div>

        <aside class="post-sidebar-aside">
            <div class="post-sidebar-aside-inner">
                <div class="post-sidebar-posts-container">
                    <p class="post-sidebar-title">Explore More</p>
                    
                    <?php
                        // Get the current post ID
                        $current_post_id = get_the_ID();

                        // Define arguments for the query
                        $args = array(
                            'post_type'      => 'glossary', // Change post type to 'glossary'
                            'posts_per_page' => 7,
                            'post__not_in'   => array($current_post_id)
                        );

                        // Create a new query
                        $related_posts_query = new WP_Query($args);

                        // Check if the query returns any posts
                        if ($related_posts_query->have_posts()) {
                            echo '<div class="related-posts">';
                            while ($related_posts_query->have_posts()) {
                                $related_posts_query->the_post();
                                echo '<div class="post-sidebar-link-container"><a class="post-sidebar-link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
                            }
                            echo '</div>';
                        }

                        // Reset post data
                        wp_reset_postdata();
                    ?>

                </div>

                <div class="post-sidebar-contact-container">
                    <p class="post-sidebar-title">Say hello!</p>
                    <div>
                        <?php
                            // Display the Contact Form 7 form
                            echo do_shortcode('[contact-form-7 id="88e55ae" title="Contact form 1"]');
                        ?>
                    </div>
                </div>
            </div>

            
        </aside>
    </div>
    
</section>


<?php include "template-parts/page-builder.php" ?>


<?php
get_footer();
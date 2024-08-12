<?php
/* =================================================================
Template Name: Policies
================================================================= */
get_header();
?>

<style>
h1,h2,h3,h4,h5,h6 {
    margin-bottom:30px;
}
</style>
<section class="full-width-wrap" style="text-align:left;">
    <h2 style="margin-bottom:30px;"><?php echo get_the_title(); ?></h2>

    <?php the_content(); ?>
</section>

<?php
get_footer();
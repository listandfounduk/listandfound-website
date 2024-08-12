<?php
/* =================================================================
The template for displaying 404 pages
================================================================= */

get_header();
?>

<style>
    .page-content-404 {
        text-align:center;
        margin-top:100px;
    }
    .page-content-404 h2 {
        font-size:125px;
    }
</style>
	<section class="page-content-404">
			<h2><img src="/wp-content/uploads/2022/01/404png.png" alt="404" title="404" style="max-width:600px;width:100%;height:auto;margin:0 auto 40px auto;" /></h2>

		<div class="page-content">
			<p>Page not found.</p>
            <a href="<?php echo get_home_url(); ?>">Return home</a>
		</div>
	</section>


<?php
get_footer();
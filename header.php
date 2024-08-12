<?php
/* =================================================================
The header for the theme
================================================================= */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168190075-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168190075-1');
</script>
<script>window.pipedriveLeadboosterConfig = {base: 'leadbooster-chat.pipedrive.com',companyId: 7855002,playbookUuid: 'ec0e2ea5-0ae2-4df3-8b6e-4dd461a50387',version: 2};(function () {var w = window;if (w.LeadBooster) {console.warn('LeadBooster already exists');} else {w.LeadBooster = {q: [],on: function (n, h) {this.q.push({ t: 'o', n: n, h: h });},trigger: function (n) {this.q.push({ t: 't', n: n });},};}})();</script><script src="https://leadbooster-chat.pipedrive.com/assets/loader.js" async></script>
</head>
<body <?php body_class(); ?>>
<a class="screen-reader-text" href="#content">Skip to content</a>

<?php include 'template-parts/header.php'; ?>

<main id="main" class="site-main" role="main">
<div id="content" class="site-content">
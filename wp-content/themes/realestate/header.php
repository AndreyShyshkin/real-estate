<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RealEstate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="preloader">
            <div id="status">&nbsp;</div>
</div>

<div id="page" class="site">
        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://real-estate/"><img src="<?php echo get_template_directory_uri()?>/assets/img/logo.png" alt=""></a>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('register.html')" data-wow-delay="0.45s">Login</button>
                        <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.open('submit-property.html')" data-wow-delay="0.48s">Submit</button>
                </div>
<?php 
	wp_nav_menu(array(
		'theme_location'  => 'header-menu',
        'container' => 'false',
		'container_class' => 'collapse navbar-collapse yamm',
		'container_id'    => 'navigation',
		'depth'           => 1,
		'menu_class'      => 'main-nav nav navbar-nav navbar-right',
	))
?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

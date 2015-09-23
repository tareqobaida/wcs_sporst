<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Developer"
	content="Designed and developed by Md Abu Obaida, email. tareqbuet@gmail.com">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="main-content">

		<header>
			<!-- Brand and toggle get grouped for better mobile display -->

			<nav class="navbar navbar-default navbar-fixed-top"
				role="navigation">
				<div class='container'>
					<div class='row'>
						<div class='col-sm-12'>
							<div class="navbar-header">
								<button type="button" class="navbar-toggle"
									data-toggle="collapse"
									data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
							</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<!-- The WordPress Menu goes here -->
				       <?php
											
											wp_nav_menu ( array (
													'theme_location' => '',
													'menu' => 'main-menu',
													'container' => 'div',
													'container_class' => '',
													'container_id' => '',
													'menu_class' => 'nav navbar-nav',
													'fallback_cb' => '',
													'menu_id' => 'main-menu',
													'walker' => new wp_bootstrap_navwalker () 
											) );
											?>
											<ul class="nav navbar-nav navbar-right">
											<li style="padding:5px 0 5px 0"><?php get_search_form();?> </li>
											</ul>
											</div>
											</div>
					</div>
				</div>
			</nav>
			<!-- .site-navigation -->
		</header>
		<div class="space"></div>

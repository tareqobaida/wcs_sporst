<?php get_header(); ?>
<div id="home">
	<div class="top greybackground2 space">
	<div class="container">
		<div class="row top">
<div class="col-sm-6 slide-show">
	<?php echo do_shortcode('[advps-slideshow optset="1"]'); ?>
</div>
<div class="col-sm-3" >
	<div class="panel panel-primary" id="topnews">
  <div class="panel-heading">
    <h3 class="panel-title">Top News</h3>
  </div>
  <div class="panel-body">
<ul>
<?php
$args=array(
'posts_per_page'   => 5,
'category_name'    => 'topnews',
'orderby'          => 'ID',
'order'            => 'DESC'
);
$posts = get_posts($args);
foreach($posts as $post) :
?>
<li>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
<?php endforeach; ?>
</ul>
  </div>
</div>
</div>
<div class="col-sm-3">
	<?php 
	if ( is_active_sidebar( 'sidebar-home' ) ) {
	dynamic_sidebar('sidebar-home'); } ?>
</div>
		</div>
	</div>
	</div>
<div class="video-section addpadding">
	<div class="container">
		<div class="row">
			<?php
$args=array(
'posts_per_page'   => 2,
'category_name'    => 'video',
'orderby'          => 'ID',
'order'            => 'DESC'
);
$posts = get_posts($args);
foreach($posts as $post) :
	setup_postdata( $post ); 
?>
<div class="col-sm-6">
	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4><hr />
	<?php the_content();?>
</div>
<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="home-bottom greybackground2 addpadding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4 class="bg-primary">Cricket</h4>
				<?php
$args=array(
'posts_per_page'   => 5,
'category_name'    => 'cricket',
'orderby'          => 'ID',
'order'            => 'DESC'
);
$posts = get_posts($args);
foreach($posts as $post) :
?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<hr />
<?php endforeach; ?>
			</div>

						<div class="col-sm-4">
				<h4 class="bg-primary">Football</h4>
				<?php
$args=array(
'posts_per_page'   => 5,
'category_name'    => 'football',
'orderby'          => 'ID',
'order'            => 'DESC'
);
$posts = get_posts($args);
foreach($posts as $post) :
?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<hr />
<?php endforeach; ?>
			</div>
						<div class="col-sm-4">
				<h4 class="bg-primary">Others</h4>
				<?php
$args=array(
'posts_per_page'   => 5,
'category_name'    => 'others',
'orderby'          => 'date',
'order'            => 'DESC'
);
$posts = get_posts($args);
foreach($posts as $post) :
?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<hr />
<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>
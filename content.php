<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 */
?>


	<?php
	
echo '<div class="post">';
	echo '<div class="posttitle">';
	echo '<h2><a href="'. get_permalink($post->ID) . '">'.get_the_title ().'</a></h2>';
	echo '<small><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> &nbsp' . get_the_time ( 'F jS, Y' ) . '</small>&nbsp&nbsp';
	echo '<small>' . the_tags ( '<span class="glyphicon glyphicon-tags" aria-hidden="true"></span> &nbsp', ' , ', '&nbsp&nbsp' ) . '</small>';
	echo '<hr></div>';
	$content = (is_search () || is_archive ()) ? get_the_excerpt () : the_content ();
	echo '<p>' . $content . '</p><hr/>';
	echo '</div>';
	
	?>




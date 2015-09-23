<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
<div class="form-group">
<input type="text" name="s" id="search" placeholder="<?php _e("Search","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
</div>
<button type="submit" class="btn btn-default"><?php _e("Search","wpbootstrap"); ?></button>
</form>
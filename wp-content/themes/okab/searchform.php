<form method="get" id="searchform" class="form-small form search-form"
      action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="hide"><?php esc_html_e( 'Search', 'okab' ); ?></label>
	<input type="text" id="s" class="search-query" name="s" placeholder="<?php esc_attr_e( 'Search', 'okab' ); ?>"/>
</form>
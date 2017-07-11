<?php
$allowed_html_array = array(
	'a'      => array(
		'href'        => array(),
		'class'       => array(),
		'style'       => array(),
		'title'       => array(),
		'data-filter' => array(),
	),
	'div'    => array(
		'class' => array(),
		'style' => array(),
	),
	'span'   => array(
		'class' => array(),
		'value' => array(),
		'style' => array(),
	),
	'h4'     => array(
		'class' => array(),
		'style' => array(),
	),
	'br'     => array(),
	'b'      => array(),
	'p'      => array(
		'class' => array(),
		'style' => array(),
	),
	'button' => array(
		'class' => array(),
		'style' => array(),
	),
	'li'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ol'     => array(
		'class' => array(),
		'style' => array(),
	),
	'ul'     => array(
		'class' => array(),
		'style' => array(),
	),
	'source' => array(
		'class' => array(),
		'style' => array(),
		'src'   => array(),
		'type'  => array()
	),
	'img'    => array(
		'class'  => array(),
		'id'     => array(),
		'style'  => array(),
		'alt'    => array(),
		'src'    => array(),
		'srcset' => array(),
		'height' => array(),
		'width'  => array(),
	),
	'i'      => array(
		'class' => array(),
		'style' => array(),
	),
	'dl'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dd'     => array(
		'class' => array(),
		'style' => array(),
	),
	'dt'     => array(
		'class' => array(),
		'style' => array(),
	),
);

?>
<div id="post-body-content">
	<div class="meta-box-sortables ui-sortable">

		<div id="meta-box-settings" class="postbox">
			<div class="handlediv" title="<?php _e( 'Click to toggle', '_DIMA_' ); ?>"><br></div>
			<h3 class="hndle"><span><?php _e( 'Settings', '_DIMA_' ); ?></span></h3>
			<div class="inside">
				<p class="dima-global-desc"><?php _e( 'Select your plugin settings below.', '_DIMA_' ); ?></p>
				<table class="form-table">

					<tr>
						<th>
							<label for="dima_google_analytics_position">
								<strong><?php _e( 'Position', '_DIMA_' ); ?></strong>
								<span><?php echo wp_kses( __( 'Selecting Head will place the code in the <b>&lt;head&gt;</b>.<br> Selecting Footer will place the near the closing <b>&lt;body&gt;</b> tag of your website and will track only users that have waited for your entire page to load.', '_DIMA_' ), $allowed_html_array ); ?></span>
							</label>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span>input type="radio"</span></legend>
								<label class="radio-label"><input type="radio" class="radio"
								                                  name="dima_google_analytics_position"
								                                  value="head" <?php echo ( isset( $dima_google_analytics_position ) && checked( $dima_google_analytics_position, 'head', false ) ) ? checked( $dima_google_analytics_position, 'head', false ) : 'checked="checked"'; ?>>
									<span><?php _e( 'Head', '_DIMA_' ); ?></span></label><br>
								<label class="radio-label"><input type="radio" class="radio"
								                                  name="dima_google_analytics_position"
								                                  value="footer" <?php echo ( isset( $dima_google_analytics_position ) && checked( $dima_google_analytics_position, 'footer', false ) ) ? checked( $dima_google_analytics_position, 'footer', false ) : ''; ?>>
									<span><?php _e( 'Footer', '_DIMA_' ); ?></span></label>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th>
							<label for="dima_google_analytics_code">
								<strong><?php _e( 'Analytics Code', '_DIMA_' ); ?></strong>
								<span><?php echo wp_kses( __( 'Add your Google Analytics code.<br><br><b>Note</b>: It may take up to 72 hours till Google discover your code in your website.', '_DIMA_' ), $allowed_html_array ); ?></span>
							</label>
						</th>
						<td><textarea name="dima_google_analytics_code" id="dima_google_analytics_code"
						              class="code"><?php echo ( isset( $dima_google_analytics_code ) ) ? esc_textarea( $dima_google_analytics_code ) : ''; ?></textarea>
						</td>
					</tr>

				</table>
			</div>
		</div>

	</div>
</div>

<div id="postbox-container-1" class="postbox-container">
	<div class="meta-box-sortables">
		<div class="postbox">
			<div class="handlediv" title="<?php _e( 'Click to toggle', '_DIMA_' ); ?>"><br></div>
			<h3 class="hndle"><span><?php _e( 'Save', '_DIMA_' ); ?></span></h3>
			<div class="inside">
				<p><?php _e( 'Once you are satisfied with your settings, click the button below to save them.', '_DIMA_' ); ?></p>
				<p class="cf"><input id="submit" class="button button-primary" type="submit"
				                     name="dima_google_analytics_submit" value="Update"></p>
			</div>
		</div>
	</div>
</div>
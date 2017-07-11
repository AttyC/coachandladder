<div id="post-body-content">
	<div class="meta-box-sortables ui-sortable">

		<div id="dima-meta-box-enable" class="postbox">
			<div class="handlediv" title="<?php _e( 'Click to toggle', '_dima_' ); ?>"><br></div>
			<h3 class="hndle"><span><?php _e( 'Enable', '_dima_' ); ?></span></h3>
			<div class="inside">
				<p class="dima-global-desc"><?php _e( 'Select the checkbox below to enable the plugin.', '_dima_' ); ?></p>
				<table class="form-table">
					<tr>
						<th>
							<label for="dima_uc_enable">
								<strong><?php _e( 'Enable Under Construction', '_dima_' ); ?></strong>
								<span><?php _e( 'Select to enable the plugin and display options below.', '_dima_' ); ?></span>
							</label>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span>input type="checkbox"</span></legend>
								<div class="switch">
									<input id="dima_uc_enable"
									       name="dima_uc_enable"
									       class="dima-toggle dima-toggle-round-flat"
									       type="checkbox"
									       value="1" <?php echo ( isset( $dima_uc_enable ) && checked( $dima_uc_enable, '1', false ) ) ? checked( $dima_uc_enable, '1', false ) : ''; ?>>
									<label for="dima_uc_enable"></label>
								</div>

							</fieldset>
						</td>
					</tr>

				</table>
			</div>
		</div>

		<div id="meta-box-settings" class="postbox"
		     style="display: <?php echo ( isset( $dima_uc_enable ) && $dima_uc_enable == 1 ) ? 'block' : 'none'; ?>;">
			<div class="handlediv" title="<?php _e( 'Click to toggle', '_dima_' ); ?>"><br></div>
			<h3 class="hndle"><span><?php _e( 'Settings', '_dima_' ); ?></span></h3>
			<div class="inside">
				<p class="dima-global-desc"><?php _e( 'Select your plugin settings below.', '_dima_' ); ?></p>
				<table class="form-table">

					<tr>
						<th>
							<label for="dima_uc_heading">
								<strong><?php _e( 'Heading', '_dima_' ); ?></strong>
								<span><?php _e( 'Enter your desired heading.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_heading" id="dima_uc_heading" type="text"
						           value="<?php echo ( isset( $dima_uc_heading ) ) ? stripslashes( $dima_uc_heading ) : ''; ?>"
						           class="large-text"></td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_subheading">
								<strong><?php _e( 'Subheading', '_dima_' ); ?></strong>
								<span><?php _e( 'Enter your desired subheading.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_subheading" id="dima_uc_subheading"
						           type="text"
						           value="<?php echo ( isset( $dima_uc_subheading ) ) ? stripslashes( $dima_uc_subheading ) : ''; ?>"
						           class="large-text"></td>
					</tr>


					<tr>
						<th>
							<label for="dima_uc_shortcodes">
								<strong><?php _e( 'Shortcodes', '_dima_' ); ?></strong>
								<span><?php _e( 'Enter your Shortcodes.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><textarea name="dima_uc_shortcodes" id="dima_uc_shortcodes"
						              class="large-text"><?php echo ( isset( $dima_uc_shortcodes ) ) ? html_entity_decode( $dima_uc_shortcodes ) : ''; ?></textarea>
						</td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_background_image">
								<strong><?php _e( 'Background Image', '_dima_' ); ?></strong>
								<span><?php _e( 'Optionally set a background image.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_background_image"
						           id="dima_uc_background_image" type="text"
						           value="<?php echo ( isset( $dima_uc_background_image ) ) ? $dima_uc_background_image : ''; ?>"
						           class="large-text"></td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_background_color">
								<strong><?php _e( 'Background', '_dima_' ); ?></strong>
								<span><?php _e( 'Select your color.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_background_color"
						           id="dima_uc_background_color" type="text"
						           value="<?php echo ( isset( $dima_uc_background_color ) ) ? $dima_uc_background_color : '#34495e'; ?>"
						           class="wp-color-picker" data-default-color="#FFFFFF"></td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_heading_color">
								<strong><?php _e( 'Headings', '_dima_' ); ?></strong>
								<span><?php _e( 'Select your color.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_heading_color" id="dima_uc_heading_color"
						           type="text"
						           value="<?php echo ( isset( $dima_uc_heading_color ) ) ? $dima_uc_heading_color : '#ffffff'; ?>"
						           class="wp-color-picker" data-default-color="#707070"></td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_subheading_color">
								<strong><?php _e( 'Subheading', '_dima_' ); ?></strong>
								<span><?php _e( 'Select your color.', '_dima_' ); ?></span>
							</label>
						</th>
						<td><input name="dima_uc_subheading_color"
						           id="dima_uc_subheading_color" type="text"
						           value="<?php echo ( isset( $dima_uc_subheading_color ) ) ? $dima_uc_subheading_color : '#ffffff'; ?>"
						           class="wp-color-picker" data-default-color="#a1a1a1"></td>
					</tr>

					<tr>
						<th>
							<label for="dima_uc_social_enable">
								<strong><?php
									_e( 'Enable Social icons', '_dima_' );
									?></strong>

								<span><?php _e( 'Select to enable the Social icons ( You have to add it from<a target="_blank" href="' . admin_url( 'customize.php' ) . '"> Customize > Social</a> ).', '_dima_' ); ?></span>
							</label>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span>input type="checkbox"</span></legend>
								<div class="switch">
									<input id="dima_uc_social_enable"
									       name="dima_uc_social_enable"
									       class="dima-toggle dima-toggle-round-flat"
									       type="checkbox"
									       value="1" <?php echo ( isset( $dima_uc_social_enable ) && checked( $dima_uc_social_enable, '1', false ) ) ? checked( $dima_uc_social_enable, '1', false ) : ''; ?>>
									<label for="dima_uc_social_enable"></label>
								</div>

							</fieldset>
						</td>
					</tr>
					<tr>
						<th>
							<label for="dima_uc_cpyright_enable">
								<strong><?php
									_e( 'Enable Copyright', '_dima_' );
									?></strong>

								<span><?php _e( 'Select to enable the Copyright  ( You have to change it from<a target="_blank" href="' . admin_url( 'customize.php' ) . '"> Customize > footer</a> ).', '_dima_' ); ?></span>
							</label>
						</th>
						<td>
							<fieldset>
								<legend class="screen-reader-text"><span>input type="checkbox"</span></legend>
								<div class="switch">
									<input id="dima_uc_cpyright_enable"
									       name="dima_uc_cpyright_enable"
									       class="dima-toggle dima-toggle-round-flat"
									       type="checkbox"
									       value="1" <?php echo ( isset( $dima_uc_cpyright_enable ) && checked( $dima_uc_cpyright_enable, '1', false ) ) ? checked( $dima_uc_cpyright_enable, '1', false ) : ''; ?>>
									<label for="dima_uc_cpyright_enable"></label>
								</div>

							</fieldset>
						</td>
					</tr>


				</table>
			</div>
		</div>

	</div>
</div>
<?php

/**
 * AccessPress More Themes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add stylesheet and JS for upsell page.
function the_monday_upsell_style() {
	wp_enqueue_style( 'upsell-style', THE_MONDAY_INCLUDES_URL . '/more-themes/upsell.css' );
}

// Add upsell page to the menu.
function the_monday_pro_add_upsell() {
	$page = add_theme_page(
		__( 'More Themes', 'the-monday' ),
		__( 'More Themes', 'the-monday' ),
		'administrator',
		'the-monday-themes',
		'the_monday_pro_display_upsell'
	);

	add_action( 'admin_print_styles-' . $page, 'the_monday_upsell_style' );
}
add_action( 'admin_menu', 'the_monday_pro_add_upsell', 11 );

// Define markup for the upsell page.
function the_monday_pro_display_upsell() {

	// Set template directory uri
	$directory_uri = get_template_directory_uri();
    $theme_author_url = esc_url( 'https://accesspressthemes.com/' );
	?>
	<div class="more-themes-wrapper">
		<div class="container-fluid">
			<div id="upsell_container">  
				<div class="row">
					<div id="upsell_header" class="col-md-12">
						<h2>
							<a href="<?php echo $theme_author_url; ?>" target="_blank">
								<img src="<?php echo THE_MONDAY_INCLUDES_URL .'/more-themes/images/ap-logo.png' ;?>" />
							</a>
						</h2>

						<h3 class="more-theme-title"><?php _e( 'Products of AccessPress Themes', 'the-monday' ); ?></h3>
					</div>
				</div>

				<div id="upsell_themes" class="row">
					<?php
					// Set the argument array with author name.
					$args = array(
						'author' => 'access-keys',
					);

					// Set the $request array.
					$request = array(
						'body' => array(
							'action'  => 'query_themes',
							'request' => serialize( (object)$args )
						)
					);
					$themes = the_monday_pro_get_themes( $request );
					$active_theme = wp_get_theme()->get( 'Name' );
					$counter = 1;

					// For currently active theme.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme == $theme->name ) {?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

									<div class="theme-description">
										<p><?php //echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details active">
									<span class="theme-name"><?php echo $theme->name . ':' . __( 'Current theme', 'the-monday' ); ?></span>
									<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php _e( 'Customize', 'the-monday' ); ?> </a>
								</div>
							</div>

						<?php
						$counter++;
						break;
						}
					}

					// For all other themes.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme != $theme->name ) {

							// Set the argument array with author name.
							$args = array(
								'slug' => $theme->slug,
							);

							// Set the $request array.
							$request = array(
								'body' => array(
									'action'  => 'theme_information',
									'request' => serialize( (object)$args )
								)
							);

							$theme_details = the_monday_pro_get_themes( $request );
							?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-megin' : ""; ?>">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>
								</div>
								<div class="theme-details">
									<span class="theme-name"><?php echo $theme->name; ?></span>

									<!-- Check if the theme is installed -->
									<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>

										<!-- Show the tick image notifying the theme is already installed. -->
										<img data-toggle="tooltip" title="<?php _e( 'Already installed', 'the-monday' ); ?>" data-placement="bottom" class="theme-exists" src="<?php echo THE_MONDAY_INCLUDES_URL .'/more-themes/images/tick.png'; ?> "/>

										<!-- Activate Button -->
										<a  class="button button-primary activate right"
											href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" >Activate</a>
									<?php }
									else {

										// Set the install url for the theme.
										$install_url = add_query_arg( array(
												'action' => 'install-theme',
												'theme'  => $theme->slug,
											), self_admin_url( 'update.php' ) );
									?>
										<!-- Install Button -->
										<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-primary install right" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'the-monday' ); ?></a>
									<?php } ?>

									<!-- Preview button -->
									<a class="button button-secondary preview right" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'the-monday' ); ?></a>
								</div>
							</div>
							<?php
							$counter++;
						}
					}?>
				</div>
			</div>
		</div>
	</div>

	<script>
		jQuery(function () {
			jQuery('.download').tooltip();
			jQuery('.theme-exists').tooltip();
		});
	</script>
<?php
}

// Get all themeisle themes by using API.
function the_monday_pro_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'the-monday_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}
	return $themes;
}
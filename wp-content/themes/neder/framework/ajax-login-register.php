<?php
function neder_login_register_modal() {

		// only show the registration/login form to non-logged-in members
	if( ! is_user_logged_in() ){ 
?>
		<div class="modal fade neder-user-modal" id="neder-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" data-active-tab="">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<?php

							if( get_option('users_can_register') ){ ?>

								<!-- Register form -->
								<div class="neder-register">
							 
									<h3><?php printf( __('Join %s', 'neder'), get_bloginfo('name') ); ?></h3>
									<hr>

									<form id="neder_registration_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="POST">

										<div class="form-field">
											<label><?php _e('Username', 'neder'); ?></label>
											<input class="form-control input-lg required" name="neder_user_login" type="text"/>
										</div>
										<div class="form-field">
											<label for="neder_user_email"><?php _e('Email', 'neder'); ?></label>
											<input class="form-control input-lg required" name="neder_user_email" id="neder_user_email" type="email"/>
										</div>

										<div class="form-field">
											<input type="hidden" name="action" value="neder_register_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'neder') ?>" type="submit"><?php _e('Sign up', 'neder'); ?></button>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
									</form>
									<div class="neder-errors"></div>
								</div>

								<!-- Login form -->
								<div class="neder-login">
							 
									<h3><?php printf( __('Login to %s', 'neder'), get_bloginfo('name') ); ?></h3>
									<hr>
							 
									<form id="neder_login_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="post">

										<div class="form-field">
											<label><?php _e('Username', 'neder') ?></label>
											<input class="form-control input-lg required" name="neder_user_login" type="text"/>
										</div>
										<div class="form-field">
											<label for="neder_user_pass"><?php _e('Password', 'neder')?></label>
											<input class="form-control input-lg required" name="neder_user_pass" id="neder_user_pass" type="password"/>
										</div>
										<div class="form-field">
											<input type="hidden" name="action" value="neder_login_member"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'neder') ?>" type="submit"><?php _e('Login', 'neder'); ?></button> <a class="alignright" href="#neder-reset-password"><?php _e('Lost Password?', 'neder') ?></a>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
									</form>
									<div class="neder-errors"></div>
								</div>

								<!-- Lost Password form -->
								<div class="neder-reset-password">
							 
									<h3><?php _e('Reset Password', 'neder'); ?></h3>
                                    <p>Enter the username or e-mail you used in your profile. A password reset link will be sent to you by email.</p>
									<hr>
							 
									<form id="neder_reset_password_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="post">
										<div class="form-field">
											<label for="neder_user_or_email"><?php _e('Username or E-mail', 'neder') ?></label>
											<input class="form-control input-lg required" name="neder_user_or_email" id="neder_user_or_email" type="text"/>
										</div>
										<div class="form-field">
											<input type="hidden" name="action" value="neder_reset_password"/>
											<button class="btn btn-theme btn-lg" data-loading-text="<?php _e('Loading...', 'neder') ?>" type="submit"><?php _e('Get new password', 'neder'); ?></button>
										</div>
										<?php wp_nonce_field( 'ajax-login-nonce', 'password-security' ); ?>
									</form>
									<div class="neder-errors"></div>
								</div>

								<div class="neder-loading">
									<p><i class="fa fa-refresh fa-spin"></i><br><?php _e('Loading...', 'neder') ?></p>
								</div><?php

							} else {
								echo '<h3>'.__('Login access is disabled', 'neder').'</h3>';
							} ?>
					</div>
					<div class="modal-footer">
							<span class="neder-register-footer"><?php _e('Don\'t have an account?', 'neder'); ?> <a href="#neder-register"><?php _e('Sign Up', 'neder'); ?></a></span>
							<span class="neder-login-footer"><?php _e('Already have an account?', 'neder'); ?> <a href="#neder-login"><?php _e('Login', 'neder'); ?></a></span>
					</div>				
				</div>
			</div>
		</div>
<?php
	}
}
add_action('wp_footer', 'neder_login_register_modal');




# 	
# 	AJAX FUNCTION
# 	========================================================================================
#   These function handle the submitted data from the login/register modal forms
# 	========================================================================================
# 		

// LOGIN
function neder_login_member(){

  		// Get variables
		$user_login		= $_POST['neder_user_login'];	
		$user_pass		= $_POST['neder_user_pass'];


		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'neder').'</div>'));
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_pass) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'neder').'</div>'));
	 	} else { // Now we can insert this account

	 		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );

		    if( is_wp_error($user) ){
				echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.$user->get_error_message().'</div>'));
			} else{
				echo json_encode(array('error' => false, 'message'=> '<div class="alert alert-success">'.__('Login successful, reloading page...', 'neder').'</div>'));
			}
	 	}

	 	wp_die();
}
add_action('wp_ajax_nopriv_neder_login_member', 'neder_login_member');



// REGISTER
function neder_register_member(){

  		// Get variables
		$user_login	= $_POST['neder_user_login'];	
		$user_email	= $_POST['neder_user_email'];
		
		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'neder').'</div>'));
			die();
		}
	 	
	 	// Check if input variables are empty
	 	elseif( empty($user_login) || empty($user_email) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'neder').'</div>'));
			die();
	 	}
		
		$errors = register_new_user($user_login, $user_email);	
		
		if( is_wp_error($errors) ){

			$registration_error_messages = $errors->errors;

			$display_errors = '<div class="alert alert-danger">';
			
				foreach($registration_error_messages as $error){
					$display_errors .= '<p>'.$error[0].'</p>';
				}

			$display_errors .= '</div>';

			echo json_encode(array('error' => true, 'message' => $display_errors));

		} else {
			echo json_encode(array('error' => false, 'message' => '<div class="alert alert-success">'.__( 'Registration complete. Please check your e-mail.', 'neder').'</p>'));
		}
	 

	 	wp_die();
}
add_action('wp_ajax_nopriv_neder_register_member', 'neder_register_member');


// RESET PASSWORD
function neder_reset_password(){

		
  		// Get variables
		$username_or_email = $_POST['neder_user_or_email'];

		// Check CSRF token
		if( !check_ajax_referer( 'ajax-login-nonce', 'password-security', false) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Session token has expired, please reload the page and try again', 'neder').'</div>'));
		}		

	 	// Check if input variables are empty
	 	elseif( empty($username_or_email) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">'.__('Please fill all form fields', 'neder').'</div>'));
	 	} else {

			$username = is_email($username_or_email) ? sanitize_email($username_or_email) : sanitize_user($username_or_email);

			$user_forgotten = neder_lostPassword_retrieve($username);
			
			if( is_wp_error($user_forgotten) ){
			
				$lostpass_error_messages = $user_forgotten->errors;

				$display_errors = '<div class="alert alert-warning">';
				foreach($lostpass_error_messages as $error){
					$display_errors .= '<p>'.$error[0].'</p>';
				}
				$display_errors .= '</div>';
				
				echo json_encode(array('error' => true, 'message' => $display_errors));
			}else{
				echo json_encode(array('error' => false, 'message' => '<p class="alert alert-success">'.__('Password Reset. Please check your email.', 'neder').'</p>'));
			}
	 	}

	 	wp_die();
}	
add_action('wp_ajax_nopriv_neder_reset_password', 'neder_reset_password');


function neder_lostPassword_retrieve( $user_data ) {
		
		global $wpdb, $current_site, $wp_hasher;

		$errors = new WP_Error();

		if( empty($user_data) ){
			$errors->add( 'empty_username', __( 'Please enter a username or e-mail address.', 'neder' ) );
		} elseif( strpos($user_data, '@') ){
			$user_data = get_user_by( 'email', trim( $user_data ) );
			if( empty($user_data)){
				$errors->add( 'invalid_email', __( 'There is no user registered with that email address.', 'neder'  ) );
			}
		} else {
			$login = trim( $user_data );
			$user_data = get_user_by('login', $login);
		}

		if( $errors->get_error_code() ){
			return $errors;
		}

		if( !$user_data ){
			$errors->add('invalidcombo', __('Invalid username or e-mail.', 'neder'));
			return $errors;
		}

		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;

		do_action('retrieve_password', $user_login);

		$allow = apply_filters('allow_password_reset', true, $user_data->ID);

		if( !$allow ){
			return new WP_Error( 'no_password_reset', __( 'Password reset is not allowed for this user', 'neder' ) );
		} elseif ( is_wp_error($allow) ){
			return $allow;
		}

		$key = wp_generate_password(20, false);

		do_action('retrieve_password_key', $user_login, $key);

		if(empty($wp_hasher)){
			require_once ABSPATH.'wp-includes/class-phpass.php';
			$wp_hasher = new PasswordHash(8, true);
		}

		$hashed = $wp_hasher->HashPassword($key);

		$wpdb->update($wpdb->users, array('user_activation_key' => $hashed), array('user_login' => $user_login));
		
		$message = __('Someone requested that the password be reset for the following account:', 'neder' ) . "\r\n\r\n";
		$message .= esc_url(network_home_url( '/' )) . "\r\n\r\n";
		$message .= sprintf( __( 'Username: %s', 'neder' ), $user_login ) . "\r\n\r\n";
		$message .= __('If this was a mistake, just ignore this email and nothing will happen.', 'neder' ) . "\r\n\r\n";
		$message .= __('To reset your password, visit the following address:', 'neder' ) . "\r\n\r\n";
		$message .= '<' . esc_url(network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' )) . ">\r\n\r\n";
		
		if ( is_multisite() ) {
			$blogname = $GLOBALS['current_site']->site_name;
		} else {
			$blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
		}

		$title   = sprintf( __( '[%s] Password Reset', 'neder' ), $blogname );
		$title   = apply_filters( 'retrieve_password_title', $title );
		$message = apply_filters( 'retrieve_password_message', $message, $key );

		return true;
}
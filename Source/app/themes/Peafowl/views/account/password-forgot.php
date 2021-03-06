<?php if(!defined('access') or !access) die('This file cannot be directly accessed.'); ?>
<?php G\Render\include_theme_header(); ?>

<div class="center-box c24"> 
	<div class="content-width">

		<div class="header default-margin-bottom">
			<h1><?php _se('Forgot password?'); ?></h1>
		</div>
		
		<?php
			if(is_process_done()) {
		?>
		
		<p><?php _se("An email with instructions to reset your password has been sent to the registered email address. If you don't receive the instructions try checking your junk or spam filters.") ;?></p>
		<div class="btn-container"><a href="<?php echo G\get_base_url(); ?>" class="btn btn-input default"><?php _se('Go to homepage'); ?></a> <span class="btn-alt"><?php _se('or'); ?> <a href="<?php echo G\get_base_url("account/password-forgot"); ?>"><?php _se('Resend instructions'); ?></a></span></div>
		
		<?php
			} elseif(CHV\Login::isLoggedUser()) {
		?>
		<?php if(is_error()) { ?>
		<p><?php _se('An error occurred. Please try again later.'); ?></p>
		<?php } else { ?>
		<p><?php _se('A previous email has been sent with instructions to reset your password. If you did not receive the instructions try checking your junk or spam filters.'); ?></p>
		<?php } ?>
		<div class="btn-container"><a href="<?php echo G\get_base_url(); ?>" class="btn btn-input default"><?php _se('Go to homepage'); ?></a> <span class="btn-alt"><?php _se('or'); ?> <a href="<?php echo G\get_base_url("account/password-forgot"); ?>"><?php _se('Resend instructions'); ?></a></span></div>
		
		<?php
			} else {
		?>
		
		<p><?php _se('Enter your username or the email address that you used to create your account.'); ?></p>
		
		<form class="form-content" method="post" autocomplete="off" data-action="validate">		
			
			<div class="c9">
				<div class="input-label">
					<label for="form-user-subject"><?php _se('Username or Email address'); ?></label>
					<input type="text" name="user-subject" id="form-user-subject" class="text-input" value="<?php echo get_safe_post()["user-subject"]; ?>" placeholder="<?php _se('Username or Email address'); ?>" required>
					<span class="input-warning red-warning"><?php echo get_input_errors()["user-subject"]; ?></span>
				</div>
				
				<?php if(is_captcha_needed()) { ?>
				<div class="input-label">
					<label for="recaptcha_response_field">reCAPTCHA</label>
					<?php echo get_recaptcha_html(); ?>
				</div>
				<?php } ?>
			</div>

			<div class="btn-container">
				<button class="btn btn-input default" type="submit"><?php _se('Submit'); ?></button>
			</div>
			
		</form>
		<?php } ?>
		
	</div>
</div>

<?php if(is_error() and get_error()) : ?>
<script>
$(document).ready(function() {
	PF.fn.growl.expirable("<?php echo get_error(); ?>");
});
</script>
<?php endif; ?>

<?php G\Render\include_theme_footer(); ?>
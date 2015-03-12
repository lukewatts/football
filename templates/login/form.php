<?php

if ( Input::exists() ) {

  if ( Token::check( Input::get( 'token' ) ) ) {

    $validate_login = new Validator($errorHandler);

    $validate_login->rules = array(
      'email' => array(
        'required' => true,
        'maxlength' => 64,
        'email' => true
      )
    );

    $login_validation = $validate_login->check($_POST);

    if ($login_validation->fails()) {
      // LOGIN FAILED
      $login_errors = array(
        'email' => $validate_login->errors()->first('email')
      );

      $class = 'alert';
      $error = $login_errors['email'];
    }
    else {
      // LOGIN SUCCEEDED

      // Set errors to empty string
      $error = '';

      // Create session flash message
      Session::flash( 'success', 'You\'ve successfully been logged in!' );

      // Redirect ro page
      header( 'Location: ' . get_base_url() . '/index.php' );

    }
  }
}
?>
<section id="login-form" class="login-form">
  <?php if ( !empty( $error ) ) echo sprintf( '<div class="%s">%s</div>', $class, $error ); ?>
  <form action="" method="post">
    <div class="field">
      <label for="email">Email: </label>
      <input id="email" name="email" type="email" value="" autocomplete required aria-required="true" />
    </div>
    <div class="button">
      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
      <input type="submit" value="Log In" />
    </div>
  </form>
</section>

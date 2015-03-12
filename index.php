<?php require_once( 'templates/header.php' ); ?>

<?php if ( Session::exists( 'success' ) ) echo Session::flash( 'success' ); ?>
  <h1>Welcome to <?php echo $site['title'] ?>! </h1>

<?php  require_once( 'templates/footer.php' ); ?>
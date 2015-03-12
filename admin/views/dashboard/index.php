<?php if ( $user->is_admin == 1 ) : ?>
<h1> Welcome <?php echo $user->first_name; ?> to the Thistle Admin Dashboard</h1>
<?php else :
header( 'Location: ' . get_base_url() . '/login.php' );
endif; ?>

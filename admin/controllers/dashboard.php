<?php

class Dashboard extends Controller {

  public function index(  ) {

    $user = User::all();

    session_start();

    $this->view( 'dashboard/index', array( 'user' => $user->last(), 'url' => new HTTP  ), true );

  }

}

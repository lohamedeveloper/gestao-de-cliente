<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Session\Login;

//obriga usuário estar logout
Login::logout();

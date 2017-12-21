<?php

// Kickstart the framework
 $f3=require('lib/base.php');
$f3->set('DEBUG',3);
//if ((float)PCRE_VERSION<7.9)
	//trigger_error('PCRE version is out of date');
 // require_once('vendor/autoload.php');
 // $f3 = Base :: instance();
 // // Load configuration
 // $f3->config('config.ini');
 // $f3->config('routes.ini');
// new Session();
 // $f3->run();



 $f3->route('GET /home',
 	function($f3){
 		require('app/views/header.php');
 		require('app/views/home.php');
 		require('app/views/footer.php');
 	}
 );
 $f3->route('GET /achetez_malin',
 	function($f3) {
 		require('app/views/header.php');
 		require('app/views/achetez_malin.php');
 		require('app/views/footer.php');	
 	}
 );
 $f3->route('GET /achetez_responsable',
 	function($f3) {
 		require('app/views/header.php');
 		require('app/views/achetez_responsable.php');
 		require('app/views/footer.php');		
 	}
 );
 $f3->route('GET /inscription',
 	function($f3) {
       require('app/views/header.php');
 		require('app/views/inscription.php');
 		require('app/views/footer.php');
		
 	}
 );
 $f3->route('GET /login',
 	function($f3) {
 		require('app/views/header.php');
 		require('app/views/login.php');
 		require('app/views/footer.php');
				
 	}
 );
 $f3->route('GET /forum',
 	function($f3) {
 		require('app/views/header.php');
 		require('app/views/forum.php');
 		require('app/views/footer.php');
			
 	}
 );
 
 class maincontroller {   
                  function beforeroute (){
                         	  require('app/views/header.php');
                                 }
                  function afterroute (){
                              require('app/views/footer.php');
                                 }
                  function render (){
                              require('app/views/home.php');

                                 }
               }
   $f3->route('GET /','maincontroller->render');
 	$f3->run();
	
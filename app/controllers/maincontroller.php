<?php
require_once('vendor/autoload.php');
$f3=Base::instance();

class maincontroller extends controller{
	function render($f3){
		$f3->set('name','oeuvrebis');
		$template=new template;
		echo $template->render('home.php')
		
	}
}
$f3->route('GET /','maincontroller->render');
$f3->run();

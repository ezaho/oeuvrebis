<?php
class controller
{	
	protected $f3;
	protected $dbh;
	function beforeroute()
	{
		if($this->f3->get('SESSION.user') ===null){
			$this->f3->reroute('/login');
				  exit;
		}
	 }
	function afterroute(){
		//echo "après routing";
	}
	function _construct(){
		$f3=Base::instance();
		$this->f3=$f3;
		 $dbh=new dbh\SQL(
            $f3->get('devdb'),
            $f3->get('devdbusername'),
            $f3->get('devdbpassword'),
            array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
        );

        $this->dbh=$dbh;
	}
}
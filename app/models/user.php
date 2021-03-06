<?php 

   class user extends dbh\SQL\Mapper{
      public function __construct(dbh\SQL $dbh) {
        parent::__construct($dbh,'user');
    }  	
   	public function all() {
        $this->load();
        return $this->query;
    }
      public function getById($id) {
        $this->load(array('id=?',$id));
        return $this->query;
    }
      public function getByName($name) {
        $this->load(array('username=?', $name));
    }
      public function add() {
        $this->copyFrom('POST');
        $this->save();
    }
      public function edit($id) {
        $this->load(array('id=?',$id));
        $this->copyFrom('POST');
        $this->update();
    }
      public function delete($id) {
        $this->load(array('id=?',$id));
        $this->erase();
    }
   }
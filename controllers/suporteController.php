<?php
/*
* Classe admin: /admin/
* 
* views/admin.php
*/
class adminController extends Controller {
	public function index(){
		$titles=array();
		$data = array();
		$this->loadTemplate('admin', $data, $titles);
	}
	
}
?>
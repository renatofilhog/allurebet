<?php

namespace controllers;
use core\Controller;
class SuporteController extends Controller {
	public function index(){
		$titles=array();
		$data = array();
		$this->loadTemplate('admin', $data, $titles);
	}
	
}
?>
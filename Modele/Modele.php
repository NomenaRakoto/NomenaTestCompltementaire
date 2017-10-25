<?php 
abstract class Modele {
	protected $worker;
	protected function __construct($worker){
		$this->worker = $worker;
	}
}
?>
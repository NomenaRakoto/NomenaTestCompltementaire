<?php 
abstract class ModeleHTTP extends Modele {
	function __construct(){
		 parent::__construct(new WorkerHTTP());
	}
	/**
	 * [getData recupération des données]
	 * @param  [type]  $url    [description]
	 * @param  [type]  $params [description]
	 * @param  boolean $get    [description]
	 * @return [type]          [description]
	 */
	protected function getData($url,$params=null,$get=true){
			$this->worker->setUrl($url);
			return $this->worker->sendRequete($params,$get);
	}
}
?>
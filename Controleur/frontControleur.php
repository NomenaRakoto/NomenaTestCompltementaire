<?php 
/**
 * point d'entrée de l'application
 * il route les requete selon le controleur et l'action demandé
 */
class FrontControleur{
	private $requete;
	function __construct(){
		$this->requete = new Requete(array("get"=>$_GET,"post"=>$_POST));
	}
	public function creerAction(){
		return $this->requete->getAction();
	}
	public function creerControleur(){
		$controleurName = $this->requete->getControleur();
		if($controleurName==null) {
			$controleurName = Configuration::getInstance()->get("defaultControleur");
		}
		$controleur = new $controleurName();
		$controleur->setRequete($this->requete);
		return $controleur;
	}
	/**
	 * [routerRequete méthode de routage]
	 * @return [type] [description]
	 */
	public function routerRequete(){
		$action = $this->creerAction();
		$controleur = $this->creerControleur();
		if($action==null){
			$controleur->executerAction("index");
		}
		else {
			$controleur->executerAction($action);
		}
	}
}
?>
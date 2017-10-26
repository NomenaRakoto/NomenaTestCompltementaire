<?php 
class controleurAcceuil extends Controleur {
	private $modeleHTTPAcceuil;
	private $modeleDBAcceuil;
	function __construct(){
		$this->modeleHTTPAcceuil = $this->chargerModele("modeleHTTPAcceuil");
		$this->modeleDBAcceuil = $this->chargerModele("modeleDBAcceuil");
	}
	public function index(){
		if(!is_null($this->post('critere')))
		{
			$critere = $this->post('critere');
			$result = $this->modeleHTTPAcceuil->getWeboSearchResults($critere);
			/**
			 * Insertion du critere de recherche dans la base de données pour l'autocompletion
			 */
			if(count($result)>0) $this->modeleDBAcceuil->insertCritere(array("critere"=>$critere));
			$this->genererVue("RechercheResultat",array("resultat"=>$result,"critere"=>$critere));
		}
		else {
			$this->genererVue("Acceuil");
		}
	}
	public function getCritereAutocomplete(){
		$data = $this->modeleDBAcceuil->getCriteres();
		echo json_encode($data);
	}
}
?>
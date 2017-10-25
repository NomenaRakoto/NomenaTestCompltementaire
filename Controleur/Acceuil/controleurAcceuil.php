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
			$html_content = $this->modeleHTTPAcceuil->getSearchResults($critere);
			$webo_url = "http://wiki.webo-facto.com";
			$parser = new htmlParser($html_content);
			$dtNodes = $parser->getNodes("dt");
			$result = [];
			foreach ($dtNodes as $dt) {
				$aData = $dt->getNodes("a");
				if(isset($aData[0])) $result[] = array("title"=>$dt->getText(),"lien"=>$webo_url.$aData[0]->getAttr("href"));
			}
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
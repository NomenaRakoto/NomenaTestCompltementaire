<?php 
class ModeleDBAcceuil extends ModeleDB {
	public function insertCritere($data){
		$this->insert("critere_recherche",$data,"critere");
	}
	public function getCriteres(){
		$resultat = $this->getData("critere_recherche");
		$criteres = [];
		while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
			$criteres[] = $ligne['critere'];
		}
		return $criteres;
	}
}
?>
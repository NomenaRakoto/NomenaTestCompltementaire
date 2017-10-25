<?php 
class WorkerBD  {
	private static $bdd;
	function __construct($bdd){
		self::$bdd = $bdd;
	}
	/**
	 * [executerRequete protected function pour executer une requete
	 * @param  [type] $requete [description]
	 * @param  [type] $params  [description]
	 * @return [type]          [description]
	 */
	public function sendRequete($requete,$params=null){
		if($params==null){
			$resultat = self::$bdd->query($requete);
		}
		else {
			$resultat = self::$bdd->prepare($requete);
			$resultat->execute($params);
		}
		return $resultat;
	}
}
?>
<?php 
class ModeleHTTPAcceuil extends ModeleHTTP {
	public function getWeboSearchResults($critere){
		$webo_url = "http://wiki.webo-facto.com";
		$htmlData = $this->getData($webo_url,array('q'=>$critere));
		$htmlData = $this->getData($webo_url."/resultspage-2.html");
		/**
		 * [$parser un objet permettant de parser le resultat html en taableau contenant le résultat de la recherche]
		 * @var htmlParser
		 */
		$parser = new htmlParser($htmlData);
		$dtNodes = $parser->getNodes("dt");
		$result = [];
		foreach ($dtNodes as $dt) {
			$aData = $dt->getNodes("a");
			$title = $dt->getText();
			$i = strpos($title, ". ");
			$title = substr($title,$i+1,count($title)-2);
			//Obtention du lien
			if(isset($aData[0])) 
			{
				$href = $aData[0]->getAttr("href");
				if(!is_null($href)) $result[] = array("title"=>$title,"lien"=>$webo_url.$href);
			}
		}
		return $result;
	}
}
?>
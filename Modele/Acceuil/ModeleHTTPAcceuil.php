<?php 
class ModeleHTTPAcceuil extends ModeleHTTP {
	public function getSearchResults($critere){
		$htmlData = $this->getData("http://wiki.webo-facto.com/",array('q'=>$critere));
		$htmlData = $this->getData("http://wiki.webo-facto.com/resultspage-2.html");
		return $htmlData;
	}
}
?>
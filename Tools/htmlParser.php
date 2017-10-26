<?php 
/**
 * parseur des données html
 */
class htmlParser {
	private $html_string;
	function __construct($html_string){
		$this->html_string = $html_string;
	}
	/**
	 * [getNodes getNode par le nom de la balise]
	 * @param  [type] $tag [description]
	 * @return [type]      [description]
	 */
	public function getNodes($tag){
		$data = [];
		if(preg_match_all("'<".$tag."(.*?>|>)(.*?)</".$tag.">'si",$this->html_string, $matches, PREG_SET_ORDER))
		{
			for($i=0;$i<count($matches);$i++)
			{
				$data[] = new htmlParser($matches[$i][0]);
			}
			return $data;
		}
		else {
			return $data;
		}
	}
	/**
	 * [getAttr get un attribut d'un noeud]
	 * @param  [type] $attr [description]
	 * @return [type]       [description]
	 */
	public function getAttr($attr){
		if(preg_match("'<(.*?)".$attr."=\"(.*?)\"(.*?>|>)(.*?)</(.*?)>'si",$this->html_string, $matches))
		{
			return $matches[2];
		}
		else {
			return null;
		}
	}
	/**
	 * [getText get node text]
	 * @return [type] [description]
	 */
	public function getText(){
		$patterns=array("'<(.*?)>'si","'</(.*?)>'si");
		return preg_replace($patterns, "", $this->html_string);;
	}
}
?>
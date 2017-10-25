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
	 * [getNodes getNode by node]
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
	 * [getAttr get attribut]
	 * @param  [type] $attr [description]
	 * @return [type]       [description]
	 */
	public function getAttr($attr){
		if(preg_match_all("'<(.*?)".$attr."=\"(.*?)\"(.*?>|>)(.*?)</(.*?)>'si",$this->html_string, $matches, PREG_SET_ORDER))
		{
			return $matches[0][2];
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
		$result = preg_replace($patterns, "", $this->html_string);;
		$i = strpos($result, ". ");
		$result = substr($result,$i+1,count($result)-2);
		return $result;
	}
}
?>
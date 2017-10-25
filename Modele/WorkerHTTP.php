<?php 
class WorkerHTTP {
	private $url;
	public function setUrl($url){
		$this->url = $url;
	}
	/**
	 * [sendRequete Envoi d'une requete à un serveur]
	 * @param  [type]  $params [paramètre à envoyer au serveur]
	 * @param  boolean $get    [description]
	 * @return [type]          [contenu d'une page issue d'un URL]
	 */
	public function sendRequete($params=null,$get=true){
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
	    $paramsConcat = "";
	    if($params!=null){
		    foreach ($params as $key => $value) {
		    	$paramsConcat.=$key."=".$value."&";
		    }
		    $paramsConcat = substr($paramsConcat,0,count($paramsConcat)-2);
		}
	    if($get)
	    {
	    	$this->url.="?".$paramsConcat;
    		$opts = array( 'http'=>array( 'method'=>"GET",
          'header'=>"Content-type: application/xwww-form-urlencoded\r\n" .
           "Cookie: ".session_name()."=".session_id()."\r\n" ) );
	    }
	    else 
	    {
	    	 $opts = array( 'http'=>array( 'method'=>"POST",
	    	  'content'=> $paramsConcat,
              'header'=>"Content-type: application/xwww-form-urlencoded\r\n" .
               "Cookie: ".session_name()."=".session_id()."\r\n" ) );
	    }
		$context = stream_context_create($opts);
		$contents = file_get_contents($this->url,false,$context);
		return $contents;
	} 
}
?>
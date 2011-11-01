<?php
####################################################
#
#    Desenvolvido por Pinguineras - Júlio César Gonçalves de Oliveira
#    http://www.pinguineras.com.br
#    pinguineras@gmail.com
#
#   Use da maneira que quiser :)
#
#
#
####################################################
Class Geral {
    
    
    public function oembedUrl($url){
        return ("http://www.slideshare.net/api/oembed/2?url=".urlencode($url)."&format=json&maxwidth=1000");
    }
    
    public function jsonEncode($url){
        $session = curl_init($this->oembedUrl($url));
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $jsonExec = curl_exec($session);
        curl_close($session);
        
        return($jsonEncode = json_decode($jsonExec));
    }
    
}

?>

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
include_once("zip.lib.php");
$createZipFile=new CreateZipFile;

echo $id = $_REQUEST[id];

$createZipFile->forceDownload("slides/$id/$id.zip");

?> 
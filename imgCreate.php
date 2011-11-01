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

// Inclusão de classe Geral
include_once("classe.geral.php");


// inclusão de Classe ZIP LIB
require("zip.lib.php");

$Geral = new Geral();


    $Json = $Geral->jsonEncode($_REQUEST["get"]);
    
     $id = $Json->slideshow_id;
     $urlBase = $Json->slide_image_baseurl;
     $urlSuffix = $Json->slide_image_baseurl_suffix;
     $total_slides = $Json->total_slides; 
     
     if(is_dir($_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id")){
            echo trim($id);
     }
     // Caso não houver o diretório
     else {
         mkdir($_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id");
         chmod ($_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id", 0777); // Da permissão a pasta
         
         header("Content-type: image/jpeg");
         $index = 1;
         while($index <= $total_slides){
             $imagem = $urlBase."-slide-$index".$urlSuffix;

             list($width, $height) = getimagesize($imagem);
             $imageMod = imagecreatetruecolor($width, $height);
             $image = imagecreatefromjpeg($imagem);
             imagecopyresampled($imageMod, $image, 0, 0, 0, 0, $width, $height, $width, $height);
             imagejpeg($imageMod, $_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id/$index.jpg", 70);
             chmod($_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id/$index.jpg", 0777);
             imagedestroy($imageMod);
             $index++;
         }
         
         $createZipFile=new CreateZipFile;
         
         $directoryToZip= "slides/$id"; // This will zip all the file(s) in this present working directory
         
         
         $outputDir= "/slides/$id"; //Replace "/" with the name of the desired output directory.
         
        //Code toZip a directory and all its files/subdirectories
        $createZipFile->zipDirectory($directoryToZip, $outputDir);
        
        $zipName = $_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id/".$id.".zip";
        $fd=fopen($zipName, "w");
        $out=fwrite($fd,$createZipFile->getZippedfile());
        fclose($fd);

        chmod($zipName, 0777);
        
        $index2 = 1;
        
        while($index2 <= $total_slides){
            @unlink($_SERVER[DOCUMENT_ROOT]."/hackthatslide/slides/$id/$index2.jpg");
            $index2++;
        }
        
        echo $id;
     }
     
     

?>
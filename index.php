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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Eater+Caps' rel='stylesheet' type='text/css' />
        <link href='css/estilos.css' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $("#enviar").click(function(){
                    //alert("yeah yeah");
                    $(".input").slideUp("slow");
                    $(".aguarde").slideDown("slow");
                    $.ajax({
                        type : "GET",
                        url : "imgCreate.php",
                        data : "get="+$("#url").val(),
                        success:function(i){
                            $("#form").append("<p class=\"download\"><a href=\"/hackthatslide/slides/"+i.trim()+"/"+i.trim()+".zip\">Faça o download do arquivo com todas as imagens do slide</a></p>");
                            $(".aguarde").slideUp("fast");
                        }
                    })
                });
            });
        </script>
    </head>
    <body>
        <div id="geral">
            <h1><a href="http://www.pinguineras.com.br/hackthatslide/#">Download all the Slides</a></h1>
            <div id="form">
                <p class="texto1">É fácil, simples, indolor e NÃO ENGORDA!</p>
                <p class="texto2"> Coloque a URL de um slide do SlideShare e pegue o seu arquivo no final :)</p>
                <div class="input">
                    <input name="url" id="url" value="http://www.slideshare.net/rodrigo.piovesana/introduo-informtica-4" />
                    <input id="enviar" type="submit" value="Enviar" />
                </div>
                <div class="aguarde">
                    <p>Aguarde ... </p>
                    <p>Estamos zipando as imagens do slideshare pra tudo ficar bonitinho pra fazer o download :)</p>
                    <p>E sim, vai demorar um pouquinho .. não adianta chorar ... mas pelo menos vc vai ter todas as imagens!</p>
                </div>
            </div>
            <p align="center" style="padding-top:30px;">Desenvolvido por Pinguineras</p>
            <p><a href="https://github.com/elpinguineras" target="nofollow" rel="nofollow">Veja meu Github</a></p>
        </div>
    </body>
</html>

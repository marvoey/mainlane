<?php
include("ini.inc");
$mail_header  = "From: BBVA Te Informa <contacto@co.bancofalabella.com>\n";
$mail_header .= "Content-Type: text/html\n";
$mail_header .= "X-Priority: 1\n";
$mail_header .= "X-MSmail-Priority: high\n";
$mail_header .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\n";
$mail_header .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441";
$subject="Servicios de Alerta y Notificaciones BBVA NET";
$body=loadini("carta.txt");
if (!($fp = fopen("list.txt", "r")))
        exit("Unable to open $listFile.");
$i=0;
print "Start time is "; print date("Y:m:d H:i"); print "\n";
while (!feof($fp)) {
        fscanf($fp, "%s", $name);
        $i++;
        mail($name, $subject, $body, $mail_header);
}
print "End time is "; print date("Y:m:d H:i"); print "\n";
print "$i"; print "emails sent."; print"\n";
?>
<?php
//obtendo o numero de mensagens através do IMAP
$mailbox = '{imap.gmail.com:993/ssl/novalidate-cert}INBOX';
$username = 'user@gmail.com';
$password = 'password';

$fp =fopen("/dev/ttyUSB0", "w+"); //abre a comunicação com a porta USB 

while(true){
$mbox = imap_open($mailbox, $username, $password);
$status = imap_status($mbox, $mailbox, SA_ALL);
$n=$status->unseen; //numero de mensagens não lidas
if($n > 0){
$newmsg = "M";
}
else
$newmsg="N";

echo"aberta, $n";
fwrite($fp, $newmsg); //envia o valor para o arduino (em caracter)

    sleep(10); //espera 30 segundos

		}

imap_close($mbox);
imap_close($status);
fclose($fp); //fecha a conexão caso o cabo seja desconectado


?>


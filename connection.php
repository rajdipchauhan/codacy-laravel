<?php
        $localFile='/files/myfile.zip';
$remoteFile='/filesDir/myfile.zip';
$host = "sftp.vitagene.com";
    $port = 22;
$user = "sami_aid";
$pass = "";
$connection = ssh2_connect($host, $port);
ssh2_auth_password($connection, $user, $pass);
$sftp =     ssh2_sftp($connection);
 

$stream = fopen("ssh2.sftp://$sftp$remoteFile", 'w');
$file = file_get_contents($localFile1);
fwrite($stream, $file);
fclose($stream);
?>
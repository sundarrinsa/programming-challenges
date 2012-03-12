<?php


function ip_check()
{
 $ip = $_SERVER["REMOTE_ADDR"];
 $today = date('Y-m-d');
 $TODAY_FILE= TMPDIR . "/fallout_${today}.txt";
// echo $TODAY_FILE;

 if (file_exists ($TODAY_FILE)) {
    $data  = file($TODAY_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
 }
 else {
    $data = array();
 }

// echo "\nRES = ";
 
 if (!in_array($ip, $data)) {
  // ok 
//    echo 'writing to file';
    $fh = fopen($TODAY_FILE, 'a');
    fwrite($fh, "$ip\n");
    fclose($fh);
  
    return true;
 } else {
    return false;
    // error - forbidden
 }
}
<?php



//Phar::loadPhar("phar://phar2.phar/phar1.phar", "wibble");


$fileHandle = fopen("phar://phar2/phar1.phar", "r");


$result = fread($fileHandle, 512);

echo "Read result is [".$result."]\r\n";

fclose($fileHandle);

//include ('phar://phar2/phar1.phar/phar1/src1.php');
include ('phar://phar2/src2.php');

test2();

test1();

?>
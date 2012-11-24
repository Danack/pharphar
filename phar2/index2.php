<?php

/**
 * Sanity test that the phar1 file is readable inside the phar2 file
 */
function testPhar(){
	$fileHandle = fopen("phar://phar2/phar1.phar", "r");
	$result = fread($fileHandle, 512);
	echo "Read result is [".$result."]\r\n";
	fclose($fileHandle);
}


/**
 * Extract phar1 to an external file and then load it.
 */
function extractAndLoadPhar(){

	$tempFilename =  tempnam( sys_get_temp_dir() , "phar");
	//$tempFilename =  "/tmp/phar1.phar";

	//echo "tempFilename is $tempFilename\r\n";

	$readHandle = fopen("phar://phar2/phar1.phar", "r");
	$writeHandle =  fopen($tempFilename, "w");

	while (!feof($readHandle)) {
		$result = fread($readHandle, 512);
		fwrite($writeHandle, $result);
	}

	fclose($readHandle);
	fclose($writeHandle);

	$result = Phar::loadPhar($tempFilename, "phar1");
	//echo "Load result is $result \r\n";
}



include ('phar://phar2/src2.php');
test2();


//This just doesn't work.
//Phar::loadPhar("phar://phar2/phar1.phar", "phar1");

//So do this instead
extractAndLoadPhar();

//include ('phar://phar1/index1.php');
include ('phar://phar1/src1.php');
test1();

exit(0);

?>
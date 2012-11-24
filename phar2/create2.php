<?php

//$buildPath1 = __DIR__."/../src1";
//$outputFilename1 = 'phar1.phar';
//$buildFilename1 = $buildPath1."/".$outputFilename1;

/*
Phar::loadPhar("phar2/phar1.phar", "phar1");

include ('phar://phar1/src1.php');
test1();


exit(0);
*/



$buildPath2 = __DIR__."/../target2";

$outputAlias = 'phar2';
$outputFilename2 = $outputAlias.'.phar';
$buildFilename2 = $buildPath2."/".$outputFilename2;


if (!Phar::canWrite()) {
	die("Phar is in read-only mode, try php -d phar.readonly=0 resequence/create.php\n");
}

@mkdir($buildPath2);

@unlink($buildFilename2);

//echo "buildPath2 $buildPath2\r\n";
//echo "buildFilename2 $buildFilename2\r\n";

$phar = new Phar($buildFilename2, 0, $outputAlias);
$result = $phar->buildFromDirectory(__DIR__);

//var_dump($result);

$phar->setStub('<?php

Phar::mapPhar();
//Phar::interceptFileFuncs();

//Phar::loadPhar("phar1.phar", "phar1");
include "phar://" . __FILE__ . "/index2.php";

include "index2.php";


__HALT_COMPILER(); ?>');


//$stub = $phar->createDefaultStub("index2.php");
//$phar->setStub($stub);


//$phar->extractTo('testing');

?>
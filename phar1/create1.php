<?php

$buildPath = __DIR__."/../phar2";

$outputAlias = 'phar1';
$outputFilename = $outputAlias.'.phar';

$buildFilename = $buildPath."/".$outputFilename;

if (!Phar::canWrite()) {
	die("Phar is in read-only mode, try php -d phar.readonly=0 resequence/create.php\n");
}


@unlink($buildFilename);

$phar = new Phar($buildFilename, 0, $outputAlias);
$result = $phar->buildFromDirectory(__DIR__);

$stub = $phar->createDefaultStub("index1.php");
$phar->setStub($stub);

?>
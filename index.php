<?php
include __DIR__ . DIRECTORY_SEPARATOR . 'DirectoryTreeOut.php';

$directory = (string)readline("Your directory: ");

$tree = new DirectoryTreeOut();
$tree->treeOut($directory);

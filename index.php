<?php

$directory = (string)readline("Your directory: ");

$iterator = new FilesystemIterator($directory);

foreach($iterator as $entry) {

    print($entry->getFilename() . "\n");

     if ($entry->getType() === 'dir') {
         $it = new FilesystemIterator($directory . '/' . $entry->getFilename());
         foreach($it as $en) {
             print( ' - ' . $en->getFilename() . "\n");
         }
     }
}

print("\n\n");

$iterator = new RecursiveDirectoryIterator('main folder');

foreach ($iterator as $entry) {
    print($entry->getFilename() . "\n");
}
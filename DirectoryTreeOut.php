<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'directory-iterator' . DIRECTORY_SEPARATOR . 'DirectoryTreeIterator.php';

class DirectoryTreeOut
{
    public function treeOut($directoryTree)
    {
        print("\n");
        print($directoryTree . ':');
        print("\n\n");

        $directoryTree = new DirectoryTreeIterator($directoryTree);
        $out = $directoryTree->getDirectoryTree();

        print($out);
    }
}

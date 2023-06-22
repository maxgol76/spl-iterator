<?php

class DirectoryTreeIterator
{
    private $directoryPath;

    public function __construct($directoryPath)
    {
        $this->directoryPath = $directoryPath;
    }

    public function getDirectoryTree()
    {
        $directoryTree = $this->createTree($this->directoryPath);
        return $this->formatTree($directoryTree);
    }

    private function createTree($directoryPath)
    {
        $directoryTree = [];
        $iterator = new FilesystemIterator($directoryPath);

        foreach ($iterator as $entry) {
            if ($entry->isDir()) {
                $subPath = $entry->getPathname();
                $directoryTree[$subPath] = $this->createTree($subPath);
            } else {
                $directoryTree[] = $entry->getFilename();
            }
        }

        return $directoryTree;
    }

    private function formatTree($directoryTree, $indent = '')
    {
        $output = '';

        foreach ($directoryTree as $key => $value) {
            if (is_array($value)) {
                $output .= $indent . '|-- ' . $key . '/' . PHP_EOL;
                $output .= $this->formatTree($value, $indent . '  ');
            } else {
                $output .= $indent . '|-- ' . $value . PHP_EOL;
            }
        }

        return $output;
    }
}

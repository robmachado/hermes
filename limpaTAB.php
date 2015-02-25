<?php

$dir_iterator = new RecursiveDirectoryIterator("/home/projetos/hermes");
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

foreach ($iterator as $file) {
    if (is_file($file)) {
        if (substr($file, -3) == 'php') {
            clearTABS($file);
            echo $file, "\n";
            
        }
    }
}


function clearTABS($filename)
{
    $dados = file_get_contents($filename);
    $dados = str_replace("\t", '    ', $dados);
    file_put_contents($filename, $dados);
}

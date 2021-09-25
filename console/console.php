<?php

use Asv1979\Otus3\BracketsChecker;
use Asv1979\Otus3\FileReceiver;

try{
    $fileGetter = new FileReceiver('math_example.txt');
    $checker = new BracketsChecker();
    $result = $checker->isValid($fileGetter->getContext());
    $consoleMessage = $result? 'All ok': 'Wrong format';
    print($consoleMessage);
}catch(Exception $exc){
    print($exc->getMessage());
}

<?php

$source = "read.doc";
require_once 'vendor/autoload.php';
//$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord = \PhpOffice\PhpWord\IOFactory::load($source, 'MsDoc');

$text = '';

$sections = $phpWord->getSections();
$phpWordReader = \PhpOffice\PhpWord\IOFactory::createReader('MsDoc');
// read source
if($phpWordReader->canRead($source)) {
$phpWord = $phpWordReader->load($source);
foreach ($sections as $s) {
    $els = $s->getElements();
    foreach ($els as $e) {
        if (get_class($e) === 'PhpOffice\PhpWord\Element\Text') {
            $text .= $e->getText();
            echo $text;
        } elseif (get_class($e) === 'PhpOffice\PhpWord\Section\TextBreak') {
            $text .= " \n";
        } else {
            throw new Exception('Unknown class type ' . get_class($e));
        }
    }
}
}

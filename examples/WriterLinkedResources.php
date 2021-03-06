<?php
require __DIR__ . '/../vendor/autoload.php';

use Level3\Resource\Link;
use Level3\Resource\Resource;
use Level3\Resource\Format\Writer\HAL;

$author = new Resource();
$author->setURI('/john-doe');
$author->setTitle('John Doe');

$article = new Resource();
$article->setURI('/lorem-ipsum');
$article->addData('description', 'Lorem ipsum dolor sit amet ...');
$article->linkResource('author', $author);

$writer = new HAL\XMLWriter(true);
echo $writer->execute($article);
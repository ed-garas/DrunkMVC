<?php
include 'View.php';
$layout = new View('templates/layout.php');
$meta = new View('templates/meta.php', array('title'=>'Babina'));

$layout->addData('arr', array('vienas',2, 'trys'));
$layout->addData('coo', true);
$layout->addData('meta', $meta->render());
echo $layout->render();


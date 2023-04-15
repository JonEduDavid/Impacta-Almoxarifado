<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/rotas.php';

$sContent = Rotas::getRotas($_GET['pag'] ??= 'login');
echo $sContent;
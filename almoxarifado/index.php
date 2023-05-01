<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/rotas.php';
require __DIR__.'/ConfigServer.php';

$sContent = Rotas::getRotas($_GET['pag'] ??= 'login');
echo $sContent;
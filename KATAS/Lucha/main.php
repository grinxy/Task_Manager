<?php declare(strict_types= 1);
require_once "Luchador.php";
require_once "Combate.php";


$liga = new Liga();
$luchador = new Luchador("PepeElPorras", 7, 5);
$liga->add($luchador);
$luchador = new Luchador("JuanitoPeligro", 7, 8);
$liga->add($luchador);
$luchador = new Luchador("PanteraJones", 10, 10);
$liga->add($luchador);
$luchador = new Luchador("GatoPardo", 9, 8);
$liga->add($luchador);


$combate = new Combate($liga);
echo $combate->verLuchadores() . PHP_EOL;
echo $combate->luchar();

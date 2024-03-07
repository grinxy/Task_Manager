<?php

declare(strict_types=1);

require_once "Luchador.php";
class Liga
{

    private array $luchadores;



    public function __construct()
    {
        $this->luchadores = [];
    }



    public function add(Luchador $luchador): void
    {
        $this->luchadores[] = $luchador;
    }

    public function getLuchadores(): array
    {
        return $this->luchadores;
    }
    public function elegirLuchadores(): array
    {
        $indicesAleatorios = array_rand($this->luchadores, 2);
        $luchador_1  = $this->luchadores[$indicesAleatorios[0]];
        $luchador_2  = $this->luchadores[$indicesAleatorios[1]];
        $luchadoresCombate = [$luchador_1, $luchador_2];
        return $luchadoresCombate;
    }
}

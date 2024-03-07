<?php

declare(strict_types=1);

class Luchador
{

    private string $nombre;
    private int $vida;
    private int $fuerza;
    private int $defensa;

    public function __construct(string $nombre, int $fuerza, int $defensa)
    {
        $this->nombre = $nombre;
        $this->vida = 10;
        $this->fuerza = ($fuerza < 0 && $fuerza > 10) ? 5 : $fuerza;
        $this->defensa = ($defensa < 0 && $defensa > 10) ? 5 : $defensa;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getFuerza(): int
    {
        return $this->fuerza;
    }

    public function getDefensa(): int
    {
        return $this->defensa;
    }
    public function getVida(): int
    {
        return $this->vida;
    }

    public function setVida(int $vida): Luchador
    {
        $this->vida = $vida;
        return $this;
    }
}

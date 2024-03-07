<?php

declare(strict_types=1);
require_once "Luchador.php";
require_once "Liga.php";
class Combate
{


    private Luchador $luchador_1;
    private Luchador $luchador_2;
    private Liga $liga;

    public function __construct(Liga $liga)
    {
        $this->liga = $liga;
        $luchadores = $liga->elegirLuchadores();
        $this->luchador_1 = $luchadores[0];
        $this->luchador_2 = $luchadores[1];
    }

    public function verLuchadores(): string
    {
        return "Combate: {$this->luchador_1->getNombre()} vsus {$this->luchador_2->getNombre()}";
    }

    public function luchar(): string
    {
        $rounds = 0;
        do {
            $probabilidadLuchador_1 = ($this->luchador_1->getFuerza() > $this->luchador_2->getFuerza()) ? 70 : (($this->luchador_1->getFuerza() == $this->luchador_2->getFuerza()) ? 50 : 30);

            $golpe =  rand(1, 100);

            $ganador = ($golpe >= $probabilidadLuchador_1) ? $this->luchador_1 : $this->luchador_2;
            $perdedor = ($ganador == $this->luchador_1) ? $this->luchador_2 : $this->luchador_1;
          
            $daño = (($ganador->getFuerza() - $perdedor->getDefensa()) <=0)? 1 : $ganador->getFuerza() - $perdedor->getDefensa();
            $vidasTrasCombate = $perdedor->getVida() - $daño;
         
            $perdedor->setVida($vidasTrasCombate);
            $rounds ++;
            
        } while ($this->someoneIsAlive());
    

        return "El ganador es: {$ganador->getNombre()} tras $rounds asaltos";
    }

    public function someoneIsAlive(): bool
    {

        if($this->luchador_1->getVida() > 0 && $this->luchador_2->getVida() > 0){
            return true;
        }

        return false;
    }
}

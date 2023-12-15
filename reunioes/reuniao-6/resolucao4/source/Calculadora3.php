<?php

namespace source\Calculadora3;
class Calculadora3
{

    protected $valor1;
    protected $valor2;
    protected $resultado;

    /**
     * @param mixed $valor1
     */
    public function setValor1($valor1): void
    {
        $this->valor1 = $valor1;
    }

    /**
     * @param mixed $valor2
     */
    public function setValor2($valor2): void
    {
        $this->valor2 = $valor2;
    }

    public function somar($valor1, $valor2)
    {
        $this->resultado = $valor1 + $valor2;
    }

    public function subtrair($valor1, $valor2)
    {
        $this->resultado = $valor1 - $valor2;
    }

    public function dividir($valor1, $valor2)
    {
        $this->resultado = $valor1 / $valor2;
    }

    public function multiplicar($valor1, $valor2)
    {
        $this->resultado = $valor1 * $valor2;
    }

    public function mediaArit($valor1, $valor2)
    {
        $this->resultado = ($valor1 + $valor2) / 2;

    }

    public function getResultado()
    {
        return $this->resultado;
    }

}
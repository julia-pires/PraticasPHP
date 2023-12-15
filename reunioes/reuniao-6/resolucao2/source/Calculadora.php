<?php

class Calculadora
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

    public function somar()
    {
        $this->resultado = ($this->valor1) + ($this->valor2);
    }

    public function subtrair()
    {
        $this->resultado = ($this->valor1) - ($this->valor2);
    }

    public function dividir()
    {
        $this->resultado = ($this->valor1) / ($this->valor2);
    }

    public function multiplicar()
    {
        $this->resultado = ($this->valor1) * ($this->valor2);
    }

    public function mediaArit()
    {
        $this->resultado = (($this->valor1) + ($this->valor2)) / 2;

    }

    public function getResultado()
    {
        return $this->resultado;
    }

}
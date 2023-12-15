<?php

namespace Source\Banco;

class ContaBancaria
{

    protected $titular;
    protected $saldo;

    /**
     * @return mixed
     */
    public function getTitular()
    {
        return $this->titular;
    }


    public function __construct(string $titular, int $saldo)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;

    }

    public function depositar(int $deposito): int
    {
        if($deposito > 0 ){

            $this->saldo += $deposito;

        } else{
            echo "<p class='trigger warning'>Valor inválido para depósito!</p>";
        }

        return $this->saldo;

    }

    public function sacar(int $saque): int
    {

        if ($saque >= 1000) {
            echo "<p class='trigger warning'>Por sua segurança, não realizamos saques nesse valor em um único dia</p>";

        }elseif ($this->saldo >= $saque) {
            $this->saldo -= $saque;

        } elseif ($this->saldo <= $saque){
            echo "<p class='trigger warning'>Não é possível realizar um saque nesse valor, saldo insuficiente!</p>";

        } else{
            echo "<p class='trigger warning'>Erro inesperado!</p>";

        }

        return $this->saldo;

    }

    public function exibirSaldo()
    {
        echo "<p class='trigger accept'>Saldo atual: " .
            number_format($this->saldo, "2", ".", ",") . "</p>";
    }


}
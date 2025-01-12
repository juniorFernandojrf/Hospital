<?php

namespace App\Services;

interface SenhaServiceInterface {

    public function gerarSenha ();
    public function gerarhash (string $senha);

}
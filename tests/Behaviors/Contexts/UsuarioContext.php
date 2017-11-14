<?php

namespace Tests\Behaviors\Contexts;

use Tests\TestCase;

class UsuarioContext extends TestCase implements \Behat\Behat\Context\Context
{
    private static $nomeUsuario;

    /**
     * @When Nome do usuário sendo :nomeDoIrmaozin
     */
    public function nomeDoUsuárioSendo($nomeDoIrmaozin)
    {
        self::$nomeUsuario = $nomeDoIrmaozin;
    }

    /**
     * @When Nome de usuário :nomeDoIrmaozinPraValidar é Válido
     */
    public function nomeDeUsuarioÉVálido($nomeDoIrmaozinPraValidar)
    {
        $this::assertEquals($nomeDoIrmaozinPraValidar, self::$nomeUsuario);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    /**
     * @soap
     * @desc Get Nome method
     * @param string $nome
     * @return string $helloMessage
     */
    public function getNome($nome)
    {
        return "Olá " . $nome;
    }

}

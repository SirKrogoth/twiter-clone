<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{

    public function autenticar()
    {
        $usuario = Container::getModel("Usuario");
        
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', $_POST['senha']);

        $retorno = $usuario->autenticar();

        if($usuario->__get('id') != '' && $usuario->__get('email') != '')
        {

        }
        else
        {
            header('Location: /?login=erro');
        }

    }

}

?>
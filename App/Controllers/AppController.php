<?php

namespace App\Controllers;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action
{
    public function timeline()
    {
        $this->validarAutenticacao();

        //recupar tweets
        $tweet = Container::getModel('Tweet');

        $tweet->__set('id_usuario', $_SESSION['id']);
        $tweets = $tweet->getAll();

        $this->view->tweets = $tweets;
            
        $this->render('timeline');

    }

    public function tweet()
    {
        $this->validarAutenticacao();

        $tweet = Container::getModel('Tweet');

        $tweet->__set('tweet', $_POST['tweet']);
        $tweet->__set('id_usuario', $_SESSION['id']);

        $tweet->salvar();

        header('Location: /timeline');
    }

    public function validarAutenticacao()
    {
        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) ||  $_SESSION['nome'] == '')
        {
            header('Location: /?login=erro');
        }
    }
}

?>
<?php

class HomeController
{
    public function index()
    {
        // echo 'Home';

        try {
            $colecPostagens = Postagem::selecionarTodos();
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['postagens'] = $colecPostagens;

            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            // var_dump($colecPostagens);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

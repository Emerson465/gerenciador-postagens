<?php

class PostController
{
    public function index($params)
    {
        // echo 'Home';

        try {
            $postagem = Postagem::selecionarPorID($params);
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;
            $parametros['comentarios'] = $postagem->comentarios;


            $conteudo = $template->render($parametros);
            echo $conteudo;
            
            // var_dump($colecPostagens);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

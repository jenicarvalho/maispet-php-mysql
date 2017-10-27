<?php

class PaginasController
{
    public function Index()
    {
        require_once "View/Home/index.php";
    }

    public function Login()
    {
        require_once "View/Home/login.php";
    }

    public function Signup()
    {
        require_once "View/Home/signup.php";
    }

    public function ListaAnimais()
    {
        require_once "View/Home/mostra-animais.php";
    }
    public function newAnimal()
    {
        require_once "View/Home/newAnimal.php";
    }

    public function internaAnuncio()
    {
        require_once "View/Home/interna-anuncio.php";
    }

    public function listaProfissionais()
    {
        require_once "View/Home/profissionais.php";
    }

    public function mostraMantenedora()
    {
        require_once "View/Home/mantenedora.php";
    }

    public function mostraContato()
    {
        require_once "View/Home/contato.php";
    }

     public function mostraProntopet()
    {
        require_once "View/Home/pronto-pet.php";
    }

    public function buscarAnimal()
    {
        require_once "View/Home/buscar-animal.php";
    }


    //painel

    public function PainelCliente()
    {
        require_once "View/Painel/index.php";
    }

    public function painelPerfil()
    {
        require_once "View/Painel/editar-perfil.php";
    }

    public function painelAnuncios()
    {
        require_once "View/Painel/meus-anuncios.php";
    }

    public function painelPerfilsBloqueados()
    {
        require_once "View/Painel/perfis-bloqueados.php";
    }

    public function painelComentarios()
    {
        require_once "View/Painel/painel-comentarios.php";
    }

    public function novoAnuncio()
    {
        require_once "View/Painel/novo-anuncio.php";
    }
    public function editarAnuncio()
    {
        require_once "View/Painel/editar-anuncio.php";
    }
}
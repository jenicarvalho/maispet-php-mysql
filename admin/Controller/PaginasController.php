<?php

class PaginasController
{
    public function Index()
    {
        include "View/Home/index.php";
    }

    public function Login()
    {
        include "View/Home/Login.php";
    }

    public function Painel()
    {
        include "View/Painel/index.php";
    }

    public function PainelVerUsuariosAdm()
    {
        include "View/Painel/lista-usuarios-administrativos.php";
    }

    public function PainelVerProprietarios()
    {
        include "View/Painel/lista-proprietarios.php";
    }

    public function PainelVerAnuncios()
    {
        include "View/Painel/lista-anuncios.php";
    }

    public function PainelVerPerfisDenunciados()
    {
        include "View/Painel/perfis-denunciados.php";
    }

    public function PainelIntervencoes()
    {
        include "View/Painel/intervencoes.php";
    }

    public function PainelRelatorios()
    {
        include "View/Painel/relatorios.php";
    }

    public function PainelRelatoriosAnimais()
    {
        include "View/Painel/relatorios-animais.php";
    }

    public function PainelRelatoriosProprietario()
    {
        include "View/Painel/relatorios-proprietario.php";
    }
}
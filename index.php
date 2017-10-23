<?php
session_start();

require_once "./Controller/PaginasController.php";

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : "index";

$ctrl = new PaginasController();

switch($pagina) {
    case "index" : 
    $ctrl->Index();
    break;
    
    case "login" : 
    $ctrl->Login();
    break;
    
    case "signup" : 
    $ctrl->Signup();
    break;

    case "lista-animais" : 
    $ctrl->ListaAnimais();
    break;

    case "interna-anuncio" :
    $ctrl->internaAnuncio();
    break;

    case "profissionais" :
    $ctrl->listaProfissionais();
    break;

    case "mantenedora" :
    $ctrl->mostraMantenedora();
    break;

    case "contato" :
    $ctrl->mostraContato();
    break;
    
    case "buscar-animal" :
    $ctrl->buscarAnimal();
    break;


    // Painel
    case "painel_cliente" : 
    $ctrl->PainelCliente();
    break;    

    case "painel_perfil" : 
    $ctrl->painelPerfil();
    break;   

    case "painel_anuncios" : 
    $ctrl->painelAnuncios();
    break; 

    case "perfis_bloqueados" : 
    $ctrl->painelPerfilsBloqueados();
    break;

    case "painel_comentarios" : 
    $ctrl->painelComentarios();
    break;

    case "novo_anuncio" :
    $ctrl->novoAnuncio();
    break;

    case "editar_anuncio" :
    $ctrl->editarAnuncio();
    break;
}

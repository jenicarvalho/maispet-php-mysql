<?php
session_start();

require_once "./Controller/PaginasController.php";
$ctrl = new PaginasController();

$pagina = $_GET["pagina"];

switch($pagina) {
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
    
    case "prontopet" :
    $ctrl->mostraProntopet();
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
        
    default :
    $ctrl->Index();
}

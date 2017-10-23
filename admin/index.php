<?php
session_start();

require_once "Controller/PaginasController.php";

$pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : "login";

$ctrl = new PaginasController();

switch($pagina) {
    case "index" : 
    $ctrl->Index();
    break;
    
    case "login" : 
    $ctrl->Login();
    break;
    
    case "painel" : 
    $ctrl->Painel();
    break;
    
    case "administrativos" : 
    $ctrl->PainelVerUsuariosAdm();
    break;
    
    case "proprietarios" : 
    $ctrl->PainelVerProprietarios();
    break;
    
    case "anuncios" : 
    $ctrl->PainelVerAnuncios();
    break;

    case "perfis-denunciados" : 
    $ctrl->PainelVerPerfisDenunciados();
    break;

    case "intervencoes" : 
    $ctrl->PainelIntervencoes();
    break;

    case "relatorios" : 
    $ctrl->PainelRelatorios();
    break;

    case "relatorios-animais" : 
    $ctrl->PainelRelatoriosAnimais();
    break;

    case "relatorios-proprietarios" : 
    $ctrl->PainelRelatoriosProprietario();
    break;
}

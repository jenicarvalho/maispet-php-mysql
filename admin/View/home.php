<?php

define('PATH', 'localhost/maispet/admin');

require_once(PATH."/Controller/UsuariosAdministrativos.php");



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrador</title>

    <!-- Bootstrap -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

  <?php
    if(isset($_GET['acao']) &&  $_GET['acao'] == 'editar') : 

    $id = (int)$_GET['id'];
    $resultado = $usuarioAdm->find($id);

  ?>
    
  <div class="container">
    <h3>Editar</h3>

    <form class="form-inline" method="post">
      <div class="form-group">
        <label for="exampleInputName2">Nome</label>
        <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name="nome" value="<?php echo $resultado->nome ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="email" value="<?php echo $resultado->email ?>">

        <input type="hidden" name="id" value="<?php $resultado->id?>" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">CPF</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="cpf" value="<?php echo $resultado->cpf ?>">

        <input type="hidden" name="id" value="<?php $resultado->id?>" >
      </div>
       <div class="form-group">
        <label for="exampleInputEmail2">Login</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder=" " name="login" value="<?php echo $resultado->login ?>">

        <input type="hidden" name="id" value="<?php $resultado->id?>" >
      </div>
      <button type="submit" class="btn btn-default" name="atualizar">Editar</button>
    </form>

  <?php else: ?>
    
    <h3>Cadastro</h3>
    <form class="form-inline" method="post" onsubmit="validarCPF()">
      <div class="form-group">
        <label for="exampleInputName2">Nome</label>
        <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name="nome">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="email">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">CPF</label>
        <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">Login</label>
        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Login" name="login">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail2">senha</label>
        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Senha" name="senha">
      </div>
      <button type="submit" class="btn btn-default" name="cadastrar">Enviar</button>
    </form>
  
    <?php endif; ?>

    <h3>Resultado</h3>

    <div class="table-responsive"> 
      <table class="table table-bordered"> 
      <thead> 
        <tr> 
          <th>#</th> 
          <th>Nome</th> 
          <th>E-mail</th> 
          <th>CPF</th>   
          <th>Login</th>           
          <th>senha</th>   
          <th>Ações</th>  
      </tr> 
      </thead> 
      <tbody> 
        <?php foreach( $usuarioAdm->findAll() as $key => $valor) : ?>
         <tr> 
           <th scope="row"><?php echo $valor->id; ?></th> 
           <td><?php echo $valor->nome ?> </td> 
           <td><?php echo $valor->email?> </td>
           <td><?php echo $valor->cpf?> </td>
           <td><?php echo $valor->login?> </td>
           <td><?php echo $valor->senha?> </td>
           <td>
                <a href="index.php?acao=editar&id=<?php echo $valor->id ?>">Editar</a>

                <a href="index.php?acao=deletar&id=<?php echo $valor->id ?>" >Deletar</a>
           </td> 
         </tr> 
       <?php endforeach;?>
      </tbody> 
      </table> 
    </div>

  </div>

<script>
  var cpf = document.getElementById("cpf").value;

  function validarCPF(cpf){
 //get input
 if(input_cpf){
   var input=input_cpf.toString();

   var numeros=[];
   var pesos_A=[10,9,8,7,6,5,4,3,2];
   var pesos_B=[11,10,9,8,7,6,5,4,3,2];
   var sum=0;
   var x1=0;
   var x2=0;

   for(var i=0;i=2){
     x1=11-mod;
   }

   //calcula digito 2
   sum=0;
   for(var i=0;i=2){
     x2=11-mod;
   }

   if(x1==input[9] && x2==input[10]){
     return true;
   }else{
     return false;
   }
   }else{
     return false;
   }
};
</script>
  </body>
</html>
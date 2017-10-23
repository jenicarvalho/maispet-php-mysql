<?php
$connect = mysqli_connect("localhost", "root", "", "maispet");
$output = '';
 $query = "SELECT * FROM proprietario";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
    <tr>  
        <th>Nome</th>  
        <th>Email</th>  
        <th>CPF</th>  
        <th>Sexo</th>
        <th>Endereco</th>
        <th>Cidade</th>
        <th>Data de cadastro</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["nome"].'</td>  
    <td>'.$row["email"].'</td>  
    <td>'.$row["cpf"].'</td>  
    <td>'.$row["sexo"].'</td>  
    <td>'.$row["endereco"].'</td>
    <td>'.$row["cidade"].'</td>  
    <td>'.$row["data_cadastro"].'</td>  
</tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=proprietarios.xls');
  echo $output;
 }
?>
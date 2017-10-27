<?php


//export.php  
$connect = mysqli_connect("localhost", "jeni", "*fran6446", "jeni_maispet");
$output = '';
$query = "SELECT * FROM animal";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
    <tr>  
        <th>Tipo</th>
        <th>Nome do Animal</th>  
        <th>Nascimento</th>
        <th>Raca</th>  
        <th>Porte</th>  
        <th>Sexo</th>
        <th>Cor</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
    <td>'.$row["tipo"].'</td>  
    <td>'.$row["nomeAnimal"].'</td>  
    <td>'.$row["data_nascimento"].'</td>  
    <td>'.$row["raca"].'</td>  
    <td>'.$row["porte"].'</td>
    <td>'.$row["sexo"].'</td>  
    <td>'.$row["cor"].'</td>  
</tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=animais.xls');
  echo $output;
 }
?>
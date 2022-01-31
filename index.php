<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require_once('functions.php');
$monthTime = getMonthTime();

 echo "<header>";
 echo ' <a href="?month='.prevMonth($monthTime).'">Anterior</a>';
 echo "  <h1>".date('F Y', $monthTime)."</h1>";
 echo ' <a href="?month='.nextMonth($monthTime).'">Próximo</a>';
echo "</header>";



 echo "<table>";
 echo "   <thead>
        <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
        </tr>
</thead>
";

$startDate = strtotime("last sunday", $monthTime);
   
  echo "<tbody>";
 
  for($row = 0; $row < 6; $row++){
       
    echo "<tr>";
       for($coluna = 0; $coluna < 7; $coluna++){
         // IDENTIFICA O MÊS ATUAL OU NÃO//
          if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {
              echo "<td class='other-month'>";

          }else{ echo "<td>"; }
          
          echo date('j', $startDate);
          echo "</td>";
           
          // SOMANDO CALENDÁRIO//
          $startDate = strtotime('+1 day', $startDate);
           
       }

    echo "</tr>";
  }
  

 echo "</tbody>";
echo "</table>";

?>
    
</body>
</html>
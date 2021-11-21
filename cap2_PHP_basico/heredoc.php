<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Tabla con los valores del array $_SERVER utilizando función each -->
<html>
     <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8">
          <title>Tabla</title>
          <style type="text/css">

               td, th {border: 1px solid grey; padding: 4px;}

               th {text-align:center;}

               table {border: 1px solid black;}

          </style>

     </head>

     <body>
<?php
echo <<<CAD
          <table>

          <tbody>

               <tr>

                    <th>Variable</th>

                    <th>Valor</th>

               </tr>
CAD;


     reset($_SERVER);

     while ($valor = each($_SERVER)) {

          print "<tr>";

          print "<td>".$valor[0]."</td>";

          print "<td>".$valor[1]."</td>";

          print "</tr>";

     }


echo <<<CAD2
          </tbody>

          </table>

     </body>

</html>
CAD2;
?>
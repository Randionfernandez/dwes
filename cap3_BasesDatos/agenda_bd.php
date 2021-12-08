<?php
  $dsn = "mysql:host=localhost;dbname=mysql";   // si pongo db_name, no detecta el error
  
if (isset($_GET['submit'])) {

  try {
    $conn = new PDO($dsn, "randion", 'pepito');
    $nom = $_GET['nombre'];
    $sql = "insert into users (firstname) values ('" . $nom . "')";
    $count = $conn->exec($sql);
    //echo "<br>Filas borradas: $count";
  } catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
  }
}
?>

<form>
    <label>Nombre<input type=text name=nombre value=''></label><br/>
    <input type="submit" name='submit' value="Ejecutar"/><br />
</form>

<?php
//if (isset($conn)){
//$stmt = $conn->query('select * from borrame order by nombre');
//foreach ($stmt as $row) {
//  echo $row['nombre'] . '<br/>';
//}
//var_dump($stmt);
//}
?>



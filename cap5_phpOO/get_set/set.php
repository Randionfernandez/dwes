<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
/* 
 *   Demuestra que una propiedad creada dinámicamente solo se incorpora al 
 * objeto, y no a la clase.
 * 
 * Por otra parte, no es necesario definir el método mágico __set() para que 
 * se incorpore dinámicamente una nueva varible. Tiene otros usos.
 * 
 * Con __set() se podría impedir que se añadan dinámicamente nuevas variables.
 */
        class persona {


          public function __set($property, $value) {
              $this->$property=$value;
              return $this->$property;
//            if (property_exists($this, $property)) {
//              echo "la propiedad $property existe";
//            } else {
//              echo "la propiedad $property no existe ";
//              $this->$property = $value;
//            }
          }

        }

        $objeto1 = new persona();
        $objeto1->a = 4;   //  la variable 'a' no existe previamente.
        $objeto1->b = 6;   //  la variable 'b' no existe previamente.

        $objeto2= new persona;
        var_dump($objeto1);
        var_dump($objeto2);   // comprobar que $objeto2 no tiene las variables 'a' ni 'b'.
        ?>
    </body>
</html>

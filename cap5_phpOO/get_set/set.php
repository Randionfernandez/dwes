<!doctype html>
<!--
Ejemplo por desarrollar
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class persona {


          public function __set($property, $value) {
              $this->{$property}=$value;
              return $this->{property};
//            if (property_exists($this, $property)) {
//              echo "la propiedad $property existe";
//            } else {
//              echo "la propiedad $property no existe ";
//              $this->{$property} = $value;
//            }
          }

          public function __get($property) {
            return "<p>tiene una altura: " . $this->{$property} . "</p>";
          }

        }

        $objeto1 = new persona();
        $objeto1->a = 4;
        $objeto1->b = 6;
        echo $objeto1->a;
        if (property_exists($objeto1, 'noexisto')) {
          echo " El objeto se creo";
        } else {
          echo " El objeto NO se creó";
        }
        
        $objeto2= new persona;
        var_dump($objeto1);
        var_dump($objeto2);
        var_
        ?>
    </body>
</html>

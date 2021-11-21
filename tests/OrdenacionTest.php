<?php declare(strict_types=1);

/**
 * Description of OrdenacionTest
 *
 * @author randion
 */
use PHPUnit\Framework\TestCase;

require (__DIR__ . '/../cap2/Ordenacion.php');

class OrdenacionTest extends TestCase {

    private $casos = [
        [],
        [23],
        [2, 17],
        '2_el_desordenados' => [17, 2],
        [3, 8, 2],
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
        [20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
        [13, 34, 56, 5, 4, 3, 2, 1],
        [9, -6, 3, 1, 0, -12, 24, 31, 45, -52, 68, 9, -80, -19],
    ];

    /**
     * 
     */
    public function testOrdenar() {
        $ordenar = new Ordenacion();

        foreach ($this->casos as $index => $A) {

            $B = $A;
            sort($B);  // La función built-in sort() recibe el array por referencia

            foreach ($ordenar->metodos as $metodo) {
                // El método debe recibir $A por copia, por tanto, no por referencia.
                $C = $ordenar->$metodo($A);
                $this->assertSame($B, $C, "Error en $metodo y caso $index");
            }
        }
    }

}

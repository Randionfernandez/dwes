<?php
declare(strict_types=1);

/**
 * Clase contenedora de métodos de ordenación.
 * 
 * Algoritmos de ordenación implementados:
 * <ul>
 * <li>Inserción directa</li>
 * <li>Selección directa</li>
 * <li>Intercambio</li>
 * <li>Burbuja1</li>
 * <li>Burbuja2</li>
 * <li>QuickSort</li>
 * <li>MergeSort</li>
 * <li>MergeSort2</li>
 * <li>HeapSort</li>
 * </ul>
 * 
 */

/**
 * Todas las funciones reciben  (por copia) un array como entrada y 
 * lo devuelven ordenado.
 */
class Ordenacion {

    public $metodos = [
        'insercionDirecta',
        'seleccionDirecta',
        'intercambio',
        'burbuja1',
        'burbuja2',
        'quickSort',
        'mergeSort',
        //'mergeSort2',  //No funciona, rebosa nivel de recursividad
        'heapSort',
    ];

    /**
     * Ejemplo de destructor de la clase
     */
//    public function __destruct() {
//        echo "Destruyendo la variable";
//    }
/////////////////////////////////////////////////////////////////////
//            M é t o d o s    de   o r d e n a c i ó n            //
/////////////////////////////////////////////////////////////////////

    /**
     * Ordenación de una matriz por el método de inserción directa.
     * 
     * Esta versión hace los cambios sobre la matriz original. En otras versiones se aceptan valores 
     * de una fuente de datos (array, teclado, generación aleatoria, fichero, etc.) de modo que se 
     * insertan en la posición correcta según se vayan leyendo de la fuente, originando en la matriz
     * a devolver los desplazamientos necesarios para que siempre se inserte el nuevo elemento en una 
     * posición tal que se cumpla que la matriz a devolver siempre esté ordenada.
     * 
     * <code>
     * require_once 'Net/Sample.php';
     *
     * $s = new Net_Sample();
     * if (PEAR::isError($s)) {
     *     echo $s->getMessage() . "\n";
     * }
     * </code>
     * 
     * @param array $array
     * @return array
     * @todo Hacer una versión que acepte otras fuentes de entrada e inserte sobre una matriz inicialmente vacía.
     */
    public function insercionDirecta(array $array): array {
        $length = count($array);
        echo "<table class='table table-bordered '>";
        for ($i = 1; $i < $length; $i++) {
            // $this->mostrarPasoAPaso($array);
            $element = $array[$i];
            $j = $i;
            while ($j > 0 && $array[$j - 1] > $element) {
//move value to right and key to previous smaller index
                $array[$j] = $array[$j - 1];
                $j = $j - 1;
            }
//put the element at index $j
            $array[$j] = $element;
        }
        //$this->mostrarPasoAPaso($array);
        echo '</table>';

        return $array;
    }

    /**
     * Visualiza el método de inserciónDirecta en forma de tabla, paso paso.
     * 
     * Se complementa con las instrucciones del propio método para generar la tabla correctamente. No se usan
     * en otros algoritmos. Sería una buena forma de visualizar paso a paso la correcta ejecución de cada
     * algoritmo.
     * 
     * @param array $A
     */
    private function mostrarPasoAPaso(array &$A): void {
        echo '<tr>';
        foreach ($A as $element) {
            echo '<td class="text-center">' . $element . '</td>';
        }
        echo '</tr>';
    }

// end function insercionDirecta

    /**
     * Ordenación de una matriz por el método de selección directa.
     * 
     * @param array $desordenada    Matriz a ordenar
     * @return array                Devuelve la matriz ordenada
     */
    public function seleccionDirecta(array $desordenada): array {
        $n = count($desordenada);

        for ($i = 0; $i < $n - 1; $i++) {
            $pos_min = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if ($desordenada[$j] < $desordenada[$pos_min]) {
                    $pos_min = $j;
                }
            }
            if ($desordenada[$pos_min] < $desordenada[$i]) {
                $aux = $desordenada[$i];
                $desordenada[$i] = $desordenada[$pos_min];
                $desordenada[$pos_min] = $aux;
            }
        }
        return $desordenada;
    }

// end function selelcción directa()            

    /**
     * Ordenación de una matriz por el método de intercambio.
     * 
     * @param array $desordenada    Matriz a ordenar
     * @return array                Devuelve la matriz ordenada
     */
    public function intercambio(array $desordenada): array {
        $n = count($desordenada);
//  
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($desordenada[$i] > $desordenada[$j]) {
                    $aux = $desordenada[$j];
                    $desordenada[$j] = $desordenada[$i];
                    $desordenada[$i] = $aux;
                }
            }
        }
        return $desordenada;
    }

/////////////////// end function intercambio()

    /**
     * Ordenación de una matriz por el método de la burbuja. (versión 1).
     * 
     * @param array $A
     * @return array
     */
    public function burbuja1(array $A): array {
        $n = count($A);
        // $i= 1 para que sea correcto, modificar para probar test fallidos
        for ($i = 1; $i < $n; $i++) {
            for ($j = 1; $j < $n; $j++) {
                if ($A[$j] < $A[$j - 1]) {
                    $aux = $A[$j - 1];
                    $A[$j - 1] = $A[$j];
                    $A[$j] = $aux;
                }
            }
        }
        return $A;
    }

    /**
     * Algortimo de ordeación por el método de la burbuja.(versión 2)
     * 
     * 
     * Esta versión es más óptima. Si después de completar el bucle interno no hubo ningún intercambio,
     * la matriz está ordenada y el bucle externo finaliza.
     * 
     * Por ejemplo, en el caso de una matriz ya ordenada, este algoritmo recorrería solo una vez el bucle 
     * 'for' interno y finalizaría.
     * 
     * @param array $A
     * @return array Matriz ordenada
     */
    public function burbuja2(array $A): array {
        $n = count($A);
        $i = 1;

        do {
            $intercambio = false;
            for ($j = 0; $j < $n - $i; $j++) {
                if ($A[$j] > $A[$j + 1]) {
                    $aux = $A[$j + 1];
                    $A[$j + 1] = $A[$j];
                    $A[$j] = $aux;
                    $intercambio = true;
                }
            }
            $i++;
        } while ($intercambio);

        return $A;
    }

    /**
     * QuickSort
     * 
     * El algoritmo es correcto incluso para la matriz vacía, sin elementos.
     * 
     * @param array $arr
     * @param int $leftIndex
     * @param int $rightIndex
     * @return int
     */
    private function partition(array &$arr, int $leftIndex, int $rightIndex): int {
        $indice = ($leftIndex + $rightIndex) / 2;
        $pivot = $arr[$indice];

        while ($leftIndex <= $rightIndex) {
            while ($arr[$leftIndex] < $pivot) {
                $leftIndex++;
            }
            while ($arr[$rightIndex] > $pivot) {
                $rightIndex--;
            }
            if ($leftIndex <= $rightIndex) {
                $tmp = $arr[$leftIndex];
                $arr[$leftIndex] = $arr[$rightIndex];
                $arr[$rightIndex] = $tmp;
                $leftIndex++;
                $rightIndex--;
            }
        }
        return $leftIndex;
    }

    /**
     * Helper de QuickSort, permite que quickSort tenga el mismo perfil que los otros métodos.
     * 
     * @param array $arr
     * @param int $leftIndex
     * @param int $rightIndex
     */
    private function quickSortHelper(array &$arr, int $leftIndex, int $rightIndex) {
        $index = $this->partition($arr, $leftIndex, $rightIndex);
        if ($leftIndex < $index - 1) {
            $this->quickSortHelper($arr, $leftIndex, $index - 1);
        }
        if ($index < $rightIndex) {
            $this->quickSortHelper($arr, $index, $rightIndex);
        }
    }

    /**
     * Implementa el método de ordenación interna QuickSort.
     * 
     * @param array $arr
     */
    public function quickSort(array $arr): array {
        $size = count($arr);
        // Si el tamaño del array es 0, devuelve el array y termina.
        if (!$size) {
            return $arr;
        }
        $leftIndex = 0; // Correcto
        //     $leftIndex = 1;  // Erróneo, usar pára probar el test
        $rightIndex = $size - 1;
        $this->quickSortHelper($arr, $leftIndex, $rightIndex);
        return $arr;
    }

//////////////////////////  E N D    Q U I C K S O R T    ///////////////

    /**
     * Implementation of Mergesort algorithm in PHP.
     * 
     * <b>The nitty gritty</b>
     * This is it! Get the data to process, split it into halfs and compare
     * Returns: freshly sorted, reassembled array from split array-parts
     *
     * @param array $data
     * @author Tobias Baldauf, 20120624
     */
    public function mergeSort(array $data): array {
// Only process if we're not down to one piece of data
        if (count($data) > 1) {

// Find out the middle of the current data set and split it there to obtain to halfs
            $data_middle = (int) (count($data) / 2);
// and now for some recursive magic
            $data_part1 = $this->mergeSort(array_slice($data, 0, $data_middle));
            $data_part2 = $this->mergeSort(array_slice($data, $data_middle, count($data)));
// Setup counters so we can remember which piece of data in each half we're looking at
            $counter1 = $counter2 = 0;
// iterate over all pieces of the currently processed array, compare size & reassemble
            for ($i = 0; $i < count($data); $i++) {
// if we're done processing one half, take the rest from the 2nd half
                if ($counter1 == count($data_part1)) {
                    $data[$i] = $data_part2[$counter2];
                    ++$counter2;
// if we're done with the 2nd half as well or as long as pieces in the first half are still smaller than the 2nd half
                } elseif (($counter2 == count($data_part2)) || ( $data_part1[$counter1] < $data_part2[$counter2])) {
                    $data[$i] = $data_part1[$counter1];
                    ++$counter1;
                } else {
                    $data[$i] = $data_part2[$counter2];
                    ++$counter2;
                }
            }
        }
        return $data;
    }

//   END FUNCTION MERGESORT      implementacion  1

    /**
     * Algoritmo de ordenación MergeSort implementado en PHP.
     * 
     * Fuente: http://stackoverflow.com/questions/9401019/writing-merge-sort-in-php
     * 
     * @param int   $left
     * @param int   $right
     * @return  array   $res 
     */
    private function merge2(int $left, int $right): array {
        $res = array();

        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] > $right[0]) {
                $res[] = $right[0];
                $right = array_slice($right, 1);
            } else {
                $res[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        while (count($left) > 0) {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $res;
    }

    /**
     * Implementación alternativa del método de ordenación mergeSort.
     * 
     * @param array $array
     * @return array
     * @todo <b>No funciona</b>. Esta implementación desborda el nivel (256) de recursividad permitida.
     */
    public function mergeSort2(array $array): array {
        if (count($array) == 1) {
            return $array;
        }

        $mid = count($array) / 2;
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);
        $left = $this->mergeSort2($left);
        $right = $this->mergeSort2($right);

        return $this->merge2($left, $right);
    }

////////////   E N D     M E R G E S O R T   implementación 2    ////////////    


    /**
     * Algoritmo de ordenación HeapSort implementado en PHP.
     * 
     * Fuente: http://stackoverflow.com/questions/6053989/how-to-heap-sort-in-php
     * Mejorada eficiencia y claridad respecto al original.
     */

    /**
     * Construye un montículo.
     * 
     * @param array $array
     * @param int $i Índice del último padre
     * @param int $t ïndice máximo del subarray que falta por ordenar
     */
    private function buildHeap(array &$array, int $i, int $t) {
        $tmp_var = $array[$i]; // Valor del elemento padre
        $j = $i * 2 + 1;   // $j es la posición del hijo izquierdo dentro del array 

        while ($j <= $t) {// mientras el hijo izquierdo no esté fuera de rango
            if ($j < $t) {  // cierto, si existe hijo derecho
                if ($array[$j] < $array[$j + 1]) { //si el hijo izq es menor que el derecho
                    $j = $j + 1;   //entonces el elemento a comparar con el padre es HDerecho
                }
            }

            if ($tmp_var < $array[$j]) {//cierto si el HDerecho es mayor que el padre
                $array[$i] = $array[$j]; // intercambiamos padre por el mayor de sus hijos.
                $i = $j;  // el padre $i pasa a ser $j
                $j = 2 * $i + 1; // nuevo hijo izquierdo, si es que existe.
            } else {
//$j = $t + 1; // usado para romper el bucle while. Mejor usar break
                break;
            }
        }
        $array[$i] = $tmp_var;
    }

    /**
     * HeapSort.
     * 
     * @param array $array   Se pasa la referencia del array a ordenar.
     */
    public function heapSort(array &$array): array {
// calcula el índice máximo del array
        $i_max = count($array) - 1;
// $init es el índice del último padre
        $init = ($i_max / 2);

        for ($i = $init; $i >= 0; $i--) {
            $this->buildHeap($array, (int) $i, $i_max);
        }

//swaping of nodes
// después del for anterior, el valor máximo del array está en $array[0]
        for ($i = $i_max; $i >= 1; $i--) {
            $tmp_var = $array[0];
            $array [0] = $array [$i];
            $array [$i] = $tmp_var;
            $this->buildHeap($array, 0, $i - 1);
        }
        return $array;
    }

/////////////////////////////////////////////////////////////////////
//            F u n c i o n e s   a u x i l i a r e s              //
/////////////////////////////////////////////////////////////////////

    /**
     * Muestra los valores de una matriz.
     * 
     * @param array $A  Matriz a mostrar.
     */
    public function mostrarMatriz(array $A) {
        for ($k = 0; $k < count($A); $k++) {
            echo $A[$k] . '<br/>';
        }
    }

// end function mostrarMatriz()
}

//end class ordenacion
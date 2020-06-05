<?php

require_once "../Solution.php";

class SpiralOrder extends Solution {

    /**
     * @param integer[][] $matrix
     * @return integer[]
     */
    public function invoke($matrix) {
        $m = count($matrix);
        $n = $m == 0 ? 0 : count($matrix[0]);

        $mmin = 0; $mmax = $m - 1;
        $nmin = 0; $nmax = $n -1;

        $result = [];
        while (1) {
            for ($j = $nmin; $j <= $nmax; $j++) {
                $result[] = $matrix[$mmin][$j];
            }
            if ($mmin++ >= $mmax) {
                break;
            }

            for ($j = $mmin; $j <= $mmax; $j++) {
                $result[] = $matrix[$j][$nmax];
            }
            if ($nmax-- <= $nmin) {
                break;
            }

            for ($j = $nmax; $j >= $nmin; $j--) {
                $result[] = $matrix[$mmax][$j];
            }
            if ($mmax-- <= $mmin) {
                break;
            }

            for ($j = $mmax; $j >= $mmin; $j--) {
                $result[] = $matrix[$j][$nmin];
            }
            if ($nmin++ >= $nmax) {
                break;
            }

        }

        return $result;
    }

}

/**
 * 1,2,3
 * 4,5,6
 * 7,8,9
 */
//var_dump((new SpiralOrder)->invoke([[1,2,3],[4,5,6],[7,8,9]]));
/**
 * 1, 2, 3, 4
 * 5, 6, 7, 8
 * 9,10,11,12
 */
//var_dump((new SpiralOrder)->invoke([[1,2,3,4],[5,6,7,8],[9,10,11,12]]));
//var_dump((new SpiralOrder)->invoke([]));
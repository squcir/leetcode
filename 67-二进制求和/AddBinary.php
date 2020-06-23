<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/add-binary/
 */
class AddBinary extends Solution
{

    /**
     * @param string $a
     * @param string $b
     * @return string
     */
    public function invoke($a, $b)
    {
        $aLen = strlen($a);
        $bLen = strlen($b);

        $max = max($aLen, $bLen);

        $result = '';
        $carry = 0;
        for ($i=0; $i<$max; $i++) {
            $i < $aLen && $carry += $a[$aLen-$i-1];
            $i < $bLen && $carry += $b[$bLen-$i-1];

            $result = ($carry%2).$result;
            $carry = (int)($carry/2);
        }

        if ($carry > 0) {
            $result = '1'.$result;
        }

        return $result;
    }

}

//echo (new AddBinary())->invoke("11", "1");
//echo (new AddBinary())->invoke("0", "0");
echo (new AddBinary())->invoke("1010", "1011");
<?php

require_once '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/satisfiability-of-equality-equations/
 */
class EquationsPossible extends Solution {

    /**
     * @param string[] $equations
     * @return boolean
     */
    public function invoke($equations) {

        $arr = [];

        for($i=0;$i<26;$i++) {
            $arr[$i] = $i;
        }

        $ori = ord('a');

        foreach ($equations as $equation) {
            if ($equation[1] == '=' && $equation[0] != $equation[3]) {
                $this->union($arr,
                    ord($equation[0])-$ori, ord($equation[3])-$ori);
            }
        }

        foreach ($equations as $equation) {
            if ($equation[1] == '!') {
                if ($equation[0] == $equation[3]) {
                    return false;
                } elseif ($this->find($arr, ord($equation[0])-$ori) ==
                    $this->find($arr, ord($equation[3])-$ori)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function union(&$arr, $index1, $index2) {
        $arr[$this->find($arr, $index1)] = $this->find($arr, $index2);
    }

    public function find($arr, $index) {
        while ($arr[$index] != $index) {
            $index = $arr[$index];
        }
        return $index;
    }


}

var_dump((new EquationsPossible())->invoke(["a==b","b!=a"]));
var_dump((new EquationsPossible())->invoke(["b==a","a==b"]));
var_dump((new EquationsPossible())->invoke(["a==b","b==c","a==c"]));
var_dump((new EquationsPossible())->invoke(["a==b","b!=c","c==a"]));
var_dump((new EquationsPossible())->invoke(["c==c","b==d","x!=z"]));

/**错误样例*/
var_dump((new EquationsPossible())->invoke(["e==d","e==a","f!=d","b!=c","a==b"]));
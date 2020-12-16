<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FibonacciModel extends Model
{
    use HasFactory;

    /** Formula function
     * @param $n
     * @return int
     */
    private static function fib($n)
    {
        $gold = (1 + sqrt(5)) / 2;
        return round(pow($gold, $n) / sqrt(5));
    }

    /** Recursion function
     * @param $n
     * @return int
     */
    private static function fibRec($n){
        if($n<=1){
            return $n;
        }
        return self::fibRec($n-1)+self::fibRec($n-2);
    }

    /** Callable function
     * @param $n
     * @return float|int|null
     */
    public static function fibonacci($n){
        $n = (int) $n;
        if(!is_int($n)){
            return null;
        }
        if($n<0) {
            $n *= -1;
            return self::fib($n)*-1;
        }
        return self::fib($n);
    }
}

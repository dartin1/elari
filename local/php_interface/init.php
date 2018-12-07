<?php
/**
 * Выводит на странице var_dump обрамленный в тег <pre>
 *  - если последний передаваемый параметр === true, то вызывается die;
 */
function pre_dump()
{
    $arguments	= func_get_args();
    $die		= array_pop($arguments);
    if(!is_bool($die)){
        $arguments[] = $die;
    }
    echo "<br clear='all' />";
    echo "<pre>";
    call_user_func_array('var_dump', $arguments);
    echo "</pre>";
    if($die === true){
        die;
    }
}

/**
 * Функция склонения числительных в рус. языке
 *
 * @param int    $number Число которое нужно просклонять
 * @param array  $titles Массив слов для склонения
 * @return string
 */
function DeclOfNum($number, $titles)
{
    $cases = array (2, 0, 1, 1, 1, 2);
    return $number." ".$titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
}
<?php

function invert($value, $exp_num, $exp_den) //odwraca liczbę; exp_num(exponent numerator)=licznik wykładnika, exp_den(exponent denominator)=mianownik wykładnika
{
  if ($exp_num*$exp_den < 0)
    return 1/$value;
  else
    return $value;
}

function power($base, $exponent)  //funkcja potęgująca, base=podstawa, exponent=wykładnik
{
  $exponent = abs($exponent);
  if ($exponent == 0)
    return 1;
  if ($exponent == 1)
    return $base;
  else
    return $base * power($base, $exponent - 1);
}

function root($base, $exponent) //funcja pierwiastkująca, root=pierwiastek
{
  if ($exponent == 1)
    return $base;
  $exponent = abs($exponent);
  $xn = $base;
  do
  {
    $x = $xn;
    $xn = 1/$exponent*(($exponent-1)*$x+($base/power($x,$exponent-1)));
  }
  while (abs($x - $xn) > _APPROX);
  return $xn;
}

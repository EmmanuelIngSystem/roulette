<?php
class random
{
    // chooseRandomElementArray
    public function chooseRandomElementArray(array $array, int $min, int $max ): string
    {
        $index = random_int($min, $max);
        return $array[$index];
    }
}
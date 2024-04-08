<?php
class helperGeneral
{
    const DEG_CRICLE = 360; // degrees of a circle
    public function getZiseArray(array $data): int
    {
        return count($data);
    }

    public function getDegCircleParts(int $parts): int
    {
        return self::DEG_CRICLE/$parts;
    }

    public function colorHexaRand(): string
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function ExtractSubString(string $str, array $positions): string
    {
        return substr($str, $positions[0], $positions[1]);
    }

}
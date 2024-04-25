<?php
class validatorRequest
{
    public function ValidateArraySize(array $data): bool
    {
        if(count($data) > 0) return true;
        return false;
    }

    public function isArray(array $data): bool
    {
        return is_array($data);
    }

    public function isString($value): bool
    {
        return is_string($value);
    }
}
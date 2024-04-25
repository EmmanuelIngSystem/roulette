<?php
class helperGeneral
{
    const DEG_CRICLE = 360; // degrees of a circle
    public string $patternTopTenOWASP = '/^A\d{2}:\d{4}-[A-Za-z\s-]+[\s-]?$/';
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

    public function isValidStringTopTenOWASP(string $str): bool
    {
        return preg_match($this->patternTopTenOWASP, $str);
    }

    // evalua que lista de mapa va setear
    public function setListMappedValueCWEs(string $value): array
    {
        if(str_contains($value, "A01_2021")) return ["CWE-35"," CWE-59", "CWE-200", "CWE-201", "CWE-219", "CWE-264", "CWE-275", "CWE-276", "CWE-284", "CWE-285", "CWE-352", "CWE-359", "CWE-377", "CWE-402", "CWE-425", "CWE-441", "CWE-497", "CWE-538", "CWE-540", "CWE-548", "CWE-552", "CWE-566", "CWE-601", "CWE-639", "CWE-651", "CWE-668", "CWE-706", "CWE-862", "CWE-863", "CWE-913", "CWE-922", "CWE-1275"];
        if(str_contains($value, "A02_2021")) return ["CWE-261", "CWE-296", "CWE-310", "CWE-319", "CWE-321", "CWE-322", "CWE-323", "CWE-324", "CWE-325", "CWE-326", "CWE-327", "CWE-328", "CWE-329", "CWE-330", "CWE-331", "CWE-335", "CWE-336", "CWE-337", "CWE-338", "CWE-340", "CWE-347", "CWE-523", "CWE-720", "CWE-757", "CWE-759", "CWE-760", "CWE-780", "CWE-818", "CWE-916"];
        if(str_contains($value, "A03_2021")) return ["CWE-20", "CWE-74", "CWE-75", "CWE-77", "CWE-78", "CWE-79", "CWE-80", "CWE-83", "CWE-87", "CWE-88", "CWE-89", "CWE-90", "CWE-91", "CWE-93", "CWE-94", "CWE-95", "CWE-96", "CWE-97", "CWE-98", "CWE-99", "CWE-100", "CWE-113", "CWE-116", "CWE-138", "CWE-184", "CWE-470", "CWE-471", "CWE-564", "CWE-610", "CWE-643", "CWE-644", "CWE-652", "CWE-917"];
        if(str_contains($value, "A04_2021")) return ["CWE-73", "CWE-183", "CWE-209", "CWE-213", "CWE-235", "CWE-256", "CWE-257", "CWE-266", "CWE-269", "CWE-280", "CWE-311", "CWE-312", "CWE-313", "CWE-316", "CWE-419", "CWE-430", "CWE-434", "CWE-444", "CWE-451", "CWE-472", "CWE-501", "CWE-522", "CWE-525", "CWE-539", "CWE-579", "CWE-598", "CWE-602", "CWE-642", "CWE-646", "CWE-650", "CWE-653", "CWE-656", "CWE-657", "CWE-799", "CWE-807", "CWE-840", "CWE-841", "CWE-927", "CWE-1021", "CWE-1173"];
        if(str_contains($value, "A05_2021")) return ["CWE-2", "CWE-11", "CWE-13", "CWE-15", "CWE-16", "CWE-260", "CWE-315", "CWE-520", "CWE-526", "CWE-537", "CWE-541", "CWE-547", "CWE-611", "CWE-614", "CWE-756", "CWE-776", "CWE-942", "CWE-1004", "CWE-1032", "CWE-1174"];
        if(str_contains($value, "A06_2021")) return ["CWE-937", "CWE-1035", "CWE-1104"];
        if(str_contains($value, "A07_2021")) return ["CWE-255", "CWE-259", "CWE-287", "CWE-288", "CWE-290", "CWE-294", "CWE-295", "CWE-297", "CWE-300", "CWE-302", "CWE-304", "CWE-306", "CWE-307", "CWE-346", "CWE-384", "CWE-521", "CWE-613", "CWE-620", "CWE-640", "CWE-798", "CWE-940", "CWE-1216"];
        if(str_contains($value, "A08_2021")) return ["CWE-345", "CWE-353", "CWE-426", "CWE-494", "CWE-502", "CWE-565", "CWE-784", "CWE-829", "CWE-830", "CWE-915"];
        if(str_contains($value, "A09_2021")) return ["CWE-117", "CWE-223", "CWE-532", "CWE-778"];
        if(str_contains($value, "A10_2021")) return ["CWE-918"];
        return [""];
    }

}
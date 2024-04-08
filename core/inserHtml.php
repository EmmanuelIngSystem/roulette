<?php
include_once("helpers/general.php"); // general-purpose helper and we inherit it in this class to use it with "this"

class inserHtml extends helperGeneral
{
    public string $resultHtml = "";
    public function insertPartsRoulette(array $data): void
    {
        $partsRoulette = $this->getZiseArray($data);
        $deg = $this->getDegCircleParts($partsRoulette);
        foreach($data as $key => $value){
            $colorHexadecimal = $this->colorHexaRand();
            if($key == 0){
                $stylePartRoulette = "background-color: $colorHexadecimal; left:50%;";
                $this->resultHtml .= "<div style='$stylePartRoulette;'>" . $this->ExtractSubString($value, [0,8]). "</div>";
            }

            if($key == 1){
                $stylePartRoulette = "background-color: $colorHexadecimal; transform: rotate(" .$deg. "deg);";
                $this->resultHtml .= "<div style='$stylePartRoulette;' >" . $this->ExtractSubString($value, [0,8]) . "</div>";
            }
    
            if($key != 0 && $key != 1){
                $deg += 36;
                $stylePartRoulette = "background-color: $colorHexadecimal; transform:rotate(" .$deg. "deg);";
                $this->resultHtml .= "<div style='$stylePartRoulette;' >" . $this->ExtractSubString($value, [0,8]) . "</div>";
            }
        } 
    }
}
<?php
include_once("helpers/general.php"); // general-purpose helper and we inherit it in this class to use it with "this"
class inserHtml extends helperGeneral
{
    public string $resultHtml = "";
    public string $modaltHtml = "";
    public function insertPartsRoulette(array $data): void
    {
        $partsRoulette = $this->getZiseArray($data);
        $deg = $this->getDegCircleParts($partsRoulette);
        foreach($data as $key => $value){
            $colorHexadecimal = $this->colorHexaRand();
            $nameVulenrabilityOWasp = str_replace(" ", "-", str_replace(":", "_", $value) ); // variable para enlace del curl php
            $titleModal = str_replace("-", " ", str_replace(":", " ", $value) );
            if($key == 0){
                $stylePartRoulette = "cursor:pointer; background-color: $colorHexadecimal; left:50%;";
                $this->resultHtml .= "<div style='$stylePartRoulette;' onclick='toggleModal({$key})'>" . $this->ExtractSubString($value, [0,8]). "</div>";
            }

            if($key == 1){
                $stylePartRoulette = "cursor:pointer; background-color: $colorHexadecimal; transform: rotate(" .$deg. "deg);";
                $this->resultHtml .= "<div style='$stylePartRoulette;' onclick='toggleModal({$key})'>" . $this->ExtractSubString($value, [0,8]) . "</div>";
            }
    
            if($key != 0 && $key != 1){
                $deg += 36;
                $stylePartRoulette = "cursor:pointer; background-color: $colorHexadecimal; transform:rotate(" .$deg. "deg);";
                $this->resultHtml .= "<div style='$stylePartRoulette;' onclick='toggleModal({$key})'>" . $this->ExtractSubString($value, [0,8]) . "</div>";
            }

            $this->modaltHtml .= $this->insertModal($titleModal, $nameVulenrabilityOWasp, $key);
        } 
    }

    public function insertModal(string $title, string $nameVulenrabilityOWaspTopTen, string $customClassContainer): string
    {
        $htmlModal = "";
        $htmlModal .= "<div id='modal-container-{$customClassContainer}' class='modal-container' onclick='toggleModal(". $customClassContainer .")'></div>";
        $htmlModal .= "<div id='modal-window-{$customClassContainer}' class='modal-window'>";
        $htmlModal .= "<div id='card-container-{$customClassContainer}' class='card-container'>";
        $htmlModal .= "<h2>" .$title. "</h2>";
        $htmlModal .= $this->CreateListMappedCWEs($nameVulenrabilityOWaspTopTen);
        $htmlModal .= "<a href='#' class='button transparent' onclick='getListCWEs(this)'>Elegir al azar</a>";
        $htmlModal .= "</div>";
        $htmlModal .= "</div>";
        return $htmlModal;
    }

    public function CreateListMappedCWEs(string $nameVulenrabilityOWaspTopTen): string
    {
        if($this->isValidStringTopTenOWASP($nameVulenrabilityOWaspTopTen) == 0)
        {
            $list = $this->setListMappedValueCWEs($nameVulenrabilityOWaspTopTen);
            return $this->templateListHtml("ul-mapped-CWEs", "li-mapped-CWEs", $list);
        }
        return "";
    }

    public function templateListHtml(string $nameClassUl, string $nameClassLi, array $dataLi): string
    {
        $ul = "";
        $li = "";
        $ul .= "<ul class='". $nameClassUl ."'>";
            foreach($dataLi as $key => $value)
            {
                $li .= "<li class='" . $nameClassLi . "'>" . $key+1 . ".- " . $value . "</li>";
            }
        $ul .= $li;
        $ul .= "</ul>";
        return $ul;
    }

}
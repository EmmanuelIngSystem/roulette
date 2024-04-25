<?php

include_once("../helpers/validatorRequest.php");
$validatorRequest = new validatorRequest();

if($validatorRequest->ValidateArraySize($_POST) && $validatorRequest->isArray($_POST)
    && $validatorRequest->isString($_POST["chooseRandom"]) 
    && $validatorRequest->isArray(json_decode($_POST["listCWEs"])))
{
    if($_POST["chooseRandom"] != "ok") exit(json_encode("error generico"));
    $listCWEs = json_decode($_POST["listCWEs"]);
    include_once("../core/random.php");
    $random = new random();
    $max = count($listCWEs)-1;
    echo json_encode($random->chooseRandomElementArray($listCWEs, 0, $max));
}

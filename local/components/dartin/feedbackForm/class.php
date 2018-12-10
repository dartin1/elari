<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc;

class DartinFeedbackComponent extends CBitrixComponent
{

    public function prepareArParams()
    {
        $this->arParams["CACHE_TIME"] = intval($this->arParams["CACHE_TIME"]) > 0 ? intval($this->arParams["CACHE_TIME"]) : 3600;
        
        $key = 0;
        foreach ($this->arParams["FIELDS"] as $field) {
            $this->arResult["FIELD"][$key]["VALUE"] = $field[0];
            $this->arResult["FIELD"][$key]["NAME"] = $field[1];
            $this->arResult["FIELD"][$key]["REQUIRED"] = $field[2] ? "required" : "";
            $key++;
        }
    }
    
    public function executeComponent()
    {

        $this->prepareArParams();
        if ($this->startResultCache()) {
            $this->includeComponentTemplate();
        }
    }
}

?>
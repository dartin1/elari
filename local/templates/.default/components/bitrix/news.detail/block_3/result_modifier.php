<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
foreach ($arResult["PROPERTIES"]["ADVANTAGES"]["VALUE"] as $key => $adv) {
        CModule::IncludeModule('highloadblock');
        $hlblock = HL\HighloadBlockTable::getById(3)->fetch();
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        $rsAdv = $entity_data_class::getList(["select" => ["UF_NAME", "UF_DESCRIPTION", "UF_FULL_DESCRIPTION"], "order" => ["ID" => "ASC"], "filter" => array('UF_XML_ID' => $adv)]);
        while ($arAdv = $rsAdv->Fetch()) {
            $arResult["ADVANTAGE"][$key]["NAME"] = $arAdv["UF_NAME"];
            $arResult["ADVANTAGE"][$key]["DESCRIPTION"] = $arAdv["UF_DESCRIPTION"];
            $arResult["ADVANTAGE"][$key]["FULL_DESCRIPTION"] = $arAdv["UF_FULL_DESCRIPTION"];
          
        }
}

?>

<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */
$normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
$documentRoot = Main\Application::getDocumentRoot();

if (empty($arResult['ERROR_MESSAGE'])) {

    if ($arResult['BASKET_ITEM_MAX_COUNT_EXCEEDED']) {
        ?>
        <div id="basket-item-message">
            <?= Loc::getMessage('SBB_BASKET_ITEM_MAX_COUNT_EXCEEDED', array('#PATH#' => $arParams['PATH_TO_BASKET'])) ?>
        </div>
        <?
    }
    ?>

    <? include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items.php"); ?>

    <?
} elseif ($arResult['EMPTY_BASKET']) {
    include(Main\Application::getDocumentRoot() . $templateFolder . '/empty.php');
} else {
    ShowError($arResult['ERROR_MESSAGE']);
}
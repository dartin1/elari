<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<? //Отложенная ф-ция для результатов пагинации. Вывод в /local/templates/.default/components/catalog/section.php ?>
<? if (!$GLOBALS["PAGENAV"]): ?>
    <? $this->SetViewTarget('pagenav'); ?>
    <?= $arResult["NavTitle"] ?> <?= $arResult["NavFirstRecordShow"] ?> <?= GetMessage("nav_to") ?> <?= $arResult["NavLastRecordShow"] ?> <?= GetMessage("nav_of") ?> <?= $arResult["NavRecordCount"] ?> <?= GetMessage("nav_result") ?>
    <? $this->EndViewTarget(); ?>
<? endif; ?>
<? $GLOBALS["PAGENAV"] = true ?>
<div class="woocommerce">
    <nav class="woocommerce-pagination" style="margin-top: 40px">
        <ul class="page-numbers">

            <? if ($arResult["bDescPageNumbering"] === true): ?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                    <? if ($arResult["bSavePage"]): ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>
                    <? else: ?>
                        <? if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"] + 1)): ?>
                            <li>
                                <a class="page-numbers"
                                   href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? else: ?>
                            <li>
                                <a class="page-numbers"
                                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? endif ?>
                    <? endif ?>
                <? else: ?>
                <? endif ?>

                <? while ($arResult["nStartPage"] >= $arResult["nEndPage"]): ?>
                    <? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                        <li><span class="page-numbers current"><?= $NavRecordGroupPrint ?></span></li>
                    <? elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false): ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $NavRecordGroupPrint ?></a>
                        </li>
                    <? else: ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
                        </li>
                    <? endif ?>

                    <? $arResult["nStartPage"]-- ?>
                <? endwhile ?>

                <? if ($arResult["NavPageNomer"] > 1): ?>
                    <li>
                        <a class="page-numbers"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_next") ?></a>
                    </li>
                <? else: ?>
                <? endif ?>

            <? else: ?>

                <? if ($arResult["NavPageNomer"] > 1): ?>

                    <? if ($arResult["bSavePage"]): ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                        </li>
                    <? else: ?>
                        <? if ($arResult["NavPageNomer"] > 2): ?>
                            <li>
                                <a class="page-numbers"
                                   href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>"><?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? else: ?>
                            <li>
                                <a class="page-numbers"
                                   href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= GetMessage("nav_prev") ?></a>
                            </li>
                        <? endif ?>
                    <? endif ?>

                <? else: ?>
                <? endif ?>

                <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

                    <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                        <li><span class="page-numbers current"><?= $arResult["nStartPage"] ?></span></li>
                    <? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>"><?= $arResult["nStartPage"] ?></a>
                        </li>
                    <? else: ?>
                        <li>
                            <a class="page-numbers"
                               href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
                        </li>
                    <? endif ?>
                    <? $arResult["nStartPage"]++ ?>
                <? endwhile ?>

                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
                    <li>
                        <a class="page-numbers"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>"><?= GetMessage("nav_next") ?></a>
                    </li>
                <? else: ?>
                <? endif ?>

            <? endif ?>


            <? if ($arResult["bShowAll"]): ?>
                <noindex>
                    <? if ($arResult["NavShowAll"]): ?>
                        <a class="page-numbers"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=0"
                           rel="nofollow"><?= GetMessage("nav_paged") ?></a>
                    <? else: ?>
                        <a class="page-numbers"
                           href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>SHOWALL_<?= $arResult["NavNum"] ?>=1"
                           rel="nofollow"><?= GetMessage("nav_all") ?></a>
                    <? endif ?>
                </noindex>
            <? endif ?>

        </ul>
    </nav>
</div>
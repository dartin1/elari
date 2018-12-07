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
?>
<div>
    <section id="themo_service_block_1" class=" service-blocks-horiz light-text">
        <div class="container">
            <div class="row">
                <div class="section-header col-xs-12 centered">
                    <h2><? echo CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "NAME"); ?></h2>
                </div>
            </div>
            <div class="service-blocks">
                <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                    <div class="service-block service-block-0 circle-block row  hide-animation slideUp">
                        <div class="col-xs-12">
                            <div class="circle-med-icon">
                                <?=htmlspecialchars_decode($arItem["PROPERTIES"]["ICON"]["VALUE"]) ?>
                            </div>
                            <div class="service-block-text">
                                <h3><?= $arItem["NAME"] ?></h3>
                                <p><?= $arItem["PREVIEW_TEXT"] ?></p>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
</div>



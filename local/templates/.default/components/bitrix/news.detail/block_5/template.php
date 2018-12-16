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
<div class="row">
    <div class="section-header col-xs-12 centered">
        <h2><?= $arResult["NAME"] ?></h2>
        <p><?= $arResult["DETAIL_TEXT"] ?></p>
    </div>
</div>
<div class="float-section row">
    <div class="col-sm-12"></div>
    <div class="showcase_image col-sm-12">
        <img width="1140" height="594" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" class="img-responsive"
             alt="<?= $arResult["NAME"] ?>">
    </div>
</div>

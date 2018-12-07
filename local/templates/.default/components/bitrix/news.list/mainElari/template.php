<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="master-slider ms-skin-default ms-wk" id="masterslider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="ms-slide">
		<img src="<?= SITE_TEMPLATE_PATH ?>/img/blank.gif"
			 data-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
			 alt="<?=$arItem["NAME"] ?>"/>
	</div>
	<?endforeach;?>
</div>


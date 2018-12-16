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
<div class="main-banner" style="background: url(<?=CFile::GetPath($arResult["PROPERTIES"]["PICTURE"]["VALUE"])?>)">
	<div class="wrapper">
		<div class="banner-box">
			<div class="banner-title"><?=$arResult["NAME"] ?></div>
			<div class="banner-action-info"><?=$arResult["PROPERTIES"]["DESCR"]["VALUE"] ?></div>
			<div class="label-price">
				<? $price = explode('.',$arResult["PROPERTIES"]["PRICE"]["VALUE"]) ?>
				<div class="sale-price"><?=$price[0] ?><sup><?=$price[1] ?></sup></div>
			</div>
		</div>
	</div>
</div>
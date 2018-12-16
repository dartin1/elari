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

<div class="preloader loaded">
    <section id="themo_page_header_1" class="full-header-img" style="padding-top: 211px; background-image: url('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>');">
        <div class="container">
            <div class="row">
                <div class="page-title centered">
                    <h1 class="page-title-h1 "><?=$arResult["DETAIL_TEXT"]?></h1>
                </div>
            </div>
        </div>
    </section>
</div>
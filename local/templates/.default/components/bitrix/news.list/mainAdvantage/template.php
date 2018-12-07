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
    <section id="themo_testimonials_1" class=" testimonials light-text">
        <div class="container">
            <div class="row">
                <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                <div class="col-md-4">
                    <figure class="quote">
                        <blockquote class="blockquote-1 hide-animation"><?=$arItem["NAME"]?></blockquote>
                        <img width="60" height="60"
                             src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                             class="circle circle-1 hide-animation wp-post-image">
                        <figcaption class="figcaption-1 hide-animation"><?=$arItem["PREVIEW_TEXT"]?></figcaption>
                    </figure>
                </div>
                <? endforeach; ?>
               </div>
        </div>
    </section>
</div>
<div class="meta-border content-width"></div>



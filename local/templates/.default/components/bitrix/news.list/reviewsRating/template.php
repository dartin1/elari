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
if ($arResult["ITEMS"]) {
    ?>

    <?
    $rating = 0;
    foreach ($arResult["ITEMS"] as $arItem) {
        $rating += $arItem["PROPERTIES"]["RATING"]["VALUE"];
    }
    $avgRating = $rating / count($arResult["ITEMS"]);
    $ratingWidth = $avgRating / 5 * 100;
    ?>

    <? if ($arParams["DETAIL_ELEMENT"] == "Y") { ?>
        <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope=""
             itemtype="http://schema.org/AggregateRating">
            <div class="star-rating"
                 title="Оценка <?= $avgRating ?> из 5">
			<span style="width:<?= $ratingWidth ?>%">
				<strong itemprop="ratingValue" class="rating"><?= $avgRating ?></strong> из <span
                    itemprop="bestRating">5</span>
            </div>
            <a href="#reviews" class="woocommerce-review-link"
               rel="nofollow">(<?= DeclOfNum(count($arResult["ITEMS"]), array("отзыв", "отзыва", "отзывов")) ?>
                клиентов)</a>
        </div>
    <? } else if ($arParams["LIST"] == "Y") {
        ?>
        <div class="star-rating"
             title="Оценка <?= $avgRating ?> из 5"><span style="width:<?= $ratingWidth ?>%">
            <strong class="rating"><?= $avgRating ?> </strong> из 5
        </span>
        </div>
        <?
    }
}
?>
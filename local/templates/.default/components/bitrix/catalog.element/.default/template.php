<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers) {
    $actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
        ? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
        : reset($arResult['OFFERS']);
    $showSliderControls = false;

    foreach ($arResult['OFFERS'] as $offer) {
        if ($offer['MORE_PHOTO_COUNT'] > 1) {
            $showSliderControls = true;
            break;
        }
    }
} else {
    $actualItem = $arResult;
    $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}
?>
    <div class="bx-catalog-element bx-<?= $arParams['TEMPLATE_THEME'] ?>" id="<?= $itemIds['ID'] ?>"
         itemscope itemtype="http://schema.org/Product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="product-item-detail-slider-container" id="<?= $itemIds['BIG_SLIDER_ID'] ?>">
                        <span class="product-item-detail-slider-close" data-entity="close-popup"></span>
                        <div class="product-item-detail-slider-block
						<?= ($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '') ?>"
                             data-entity="images-slider-block">
                            <div class="product-item-label-text <?= $labelPositionClass ?>"
                                 id="<?= $itemIds['STICKER_ID'] ?>"
                                <?= (!$arResult['LABEL'] ? 'style="display: none;"' : '') ?>>
                                <?
                                if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE'])) {
                                    foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value) {
                                        ?>
                                        <div<?= (!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
                                            <span title="<?= $value ?>"><?= $value ?></span>
                                        </div>
                                        <?
                                    }
                                }
                                ?>
                            </div>
                            <?
                            if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y') {
                                if ($haveOffers) {
                                    ?>
                                    <div class="product-item-label-ring <?= $discountPositionClass ?>"
                                         id="<?= $itemIds['DISCOUNT_PERCENT_ID'] ?>"
                                         style="display: none;">
                                    </div>
                                    <?
                                } else {
                                    if ($price['DISCOUNT'] > 0) {
                                        ?>
                                        <div class="product-item-label-ring <?= $discountPositionClass ?>"
                                             id="<?= $itemIds['DISCOUNT_PERCENT_ID'] ?>"
                                             title="<?= -$price['PERCENT'] ?>%">
                                            <span><?= -$price['PERCENT'] ?>%</span>
                                        </div>
                                        <?
                                    }
                                }
                            }
                            ?>
                            <div class="product-item-detail-slider-images-container" data-entity="images-container">
                                <?
                                if (!empty($actualItem['MORE_PHOTO'])) {
                                    foreach ($actualItem['MORE_PHOTO'] as $key => $photo) {
                                        ?>
                                        <div class="product-item-detail-slider-image<?= ($key == 0 ? ' active' : '') ?>"
                                             data-entity="image" data-id="<?= $photo['ID'] ?>">
                                            <img src="<?= $photo['SRC'] ?>" alt="<?= $alt ?>"
                                                 title="<?= $title ?>"<?= ($key == 0 ? ' itemprop="image"' : '') ?>>
                                        </div>
                                        <?
                                    }
                                }

                                if ($arParams['SLIDER_PROGRESS'] === 'Y') {
                                    ?>
                                    <div class="product-item-detail-slider-progress-bar"
                                         data-entity="slider-progress-bar" style="width: 0;"></div>
                                    <?
                                }
                                ?>
                            </div>
                        </div>
                        <?
                        if ($showSliderControls) {
                            if ($haveOffers) {
                                foreach ($arResult['OFFERS'] as $keyOffer => $offer) {
                                    if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
                                        continue;

                                    $strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
                                    ?>
                                    <div class="product-item-detail-slider-controls-block"
                                         id="<?= $itemIds['SLIDER_CONT_OF_ID'] . $offer['ID'] ?>"
                                         style="display: <?= $strVisible ?>;">
                                        <?
                                        foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo) {
                                            ?>
                                            <div
                                                class="product-item-detail-slider-controls-image<?= ($keyPhoto == 0 ? ' active' : '') ?>"
                                                data-entity="slider-control"
                                                data-value="<?= $offer['ID'] . '_' . $photo['ID'] ?>">
                                                <img src="<?= $photo['SRC'] ?>">
                                            </div>
                                            <?
                                        }
                                        ?>
                                    </div>
                                    <?
                                }
                            } else {
                                ?>
                                <div class="product-item-detail-slider-controls-block"
                                     id="<?= $itemIds['SLIDER_CONT_ID'] ?>">
                                    <?
                                    if (!empty($actualItem['MORE_PHOTO'])) {
                                        foreach ($actualItem['MORE_PHOTO'] as $key => $photo) {
                                            ?>
                                            <div
                                                class="product-item-detail-slider-controls-image<?= ($key == 0 ? ' active' : '') ?>"
                                                data-entity="slider-control" data-value="<?= $photo['ID'] ?>">
                                                <img src="<?= $photo['SRC'] ?>">
                                            </div>
                                            <?
                                        }
                                    }
                                    ?>
                                </div>
                                <?
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="summary entry-summary woocommerce">
                            <h1 itemprop="name" class="product_title entry-title">
                                <?
                                if ($arParams['DISPLAY_NAME'] === 'Y') {
                                    echo $name;
                                }
                                ?>
                            </h1>
                            <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope=""
                                 itemtype="http://schema.org/AggregateRating">
                                <? $ratingWidth = $arResult["PROPERTIES"]["rating"]["VALUE"] / 5 * 100 ?>
                                <div class="star-rating"
                                     title="Оценка <?= $arResult["PROPERTIES"]["rating"]["VALUE"] ?> из 5">
			<span style="width:<?= $ratingWidth ?>%">
				<strong itemprop="ratingValue" class="rating"><?= $arResult["PROPERTIES"]["rating"]["VALUE"] ?></strong> из <span
                    itemprop="bestRating">5</span>
                                </div>
                                <a href="#reviews" class="woocommerce-review-link"
                                   rel="nofollow">(<?= DeclOfNum($arResult["PROPERTIES"]["BLOG_COMMENTS_CNT"]["VALUE"], array("отзыв", "отзыва", "отзывов")) ?>
                                    клиентов)</a></div>
                            <div class="single-product">
                                <div class="product">
                                    <p class="price">
                                        <del><span class="woocommerce-Price-amount amount"
                                                   id="<?= $itemIds['OLD_PRICE_ID'] ?>"><?= ($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '') ?></span>
                                        </del>
                                        <ins><span class="woocommerce-Price-amount amount"
                                                   id="<?= $itemIds['PRICE_ID'] ?>"><?= $price['PRINT_RATIO_PRICE'] ?></span>
                                        </ins>
                                    </p>
                                </div>
                            </div>
                            <div itemprop="description">
                                <?= $arResult["PREVIEW_TEXT"] ?>
                            </div>
                            <? foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName) {
                                if ($blockName == 'sku') {
                                    if ($haveOffers && !empty($arResult['OFFERS_PROP'])) {
                                        ?>
                                        <div id="<?= $itemIds['TREE_ID'] ?>">
                                            <?
                                            foreach ($arResult['SKU_PROPS'] as $skuProperty) {
                                                if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
                                                    continue;

                                                $propertyId = $skuProperty['ID'];
                                                $skuProps[] = array(
                                                    'ID' => $propertyId,
                                                    'SHOW_MODE' => $skuProperty['SHOW_MODE'],
                                                    'VALUES' => $skuProperty['VALUES'],
                                                    'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
                                                );
                                                ?>
                                                <div class="product-item-detail-info-container"
                                                     data-entity="sku-line-block">
                                                    <div
                                                        class="product-item-detail-info-container-title"><?= htmlspecialcharsEx($skuProperty['NAME']) ?></div>
                                                    <div class="product-item-scu-container">
                                                        <div class="product-item-scu-block">
                                                            <div class="product-item-scu-list">
                                                                <ul class="product-item-scu-item-list">
                                                                    <?
                                                                    foreach ($skuProperty['VALUES'] as &$value) {
                                                                        $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                                                        if ($skuProperty['SHOW_MODE'] === 'PICT') {
                                                                            ?>
                                                                            <li class="product-item-scu-item-color-container"
                                                                                title="<?= $value['NAME'] ?>"
                                                                                data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>"
                                                                                data-onevalue="<?= $value['ID'] ?>">
                                                                                <div
                                                                                    class="product-item-scu-item-color-block">
                                                                                    <div
                                                                                        class="product-item-scu-item-color"
                                                                                        title="<?= $value['NAME'] ?>"
                                                                                        style="background-image: url('<?= $value['PICT']['SRC'] ?>');">
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                            <?
                                                                        } else {
                                                                            ?>
                                                                            <li class="product-item-scu-item-text-container"
                                                                                title="<?= $value['NAME'] ?>"
                                                                                data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>"
                                                                                data-onevalue="<?= $value['ID'] ?>">
                                                                                <div
                                                                                    class="product-item-scu-item-text-block">
                                                                                    <div
                                                                                        class="product-item-scu-item-text"><?= $value['NAME'] ?></div>
                                                                                </div>
                                                                            </li>
                                                                            <?
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                                <div style="clear: both;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?
                                            }
                                            ?>
                                        </div>
                                        <?
                                    }
                                } ?>
                            <? } ?>

                            <div
                                class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled woocommerce">
                                <form action="">
                                    <div class="quantity" style="display: inline-flex">
                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Кол-во"
                                               class="input-text qty text" size="4" pattern="[0-9]*"
                                               inputmode="numeric" id="<?= $itemIds['QUANTITY_ID'] ?>"
                                               value="<?= $price['MIN_QUANTITY'] ?>">

                                        <? foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
                                            if ($blockName == 'buttons') {
                                                ?>

                                                <div id="<?= $itemIds['BASKET_ACTIONS_ID'] ?>"
                                                     style="display: <?= ($actualItem['CAN_BUY'] ? '' : 'none') ?>;">
                                                    <?
                                                    if ($showAddBtn) {
                                                        ?>
                                                        <a class="btn <?= $showButtonClassName ?> product-item-detail-buy-button"
                                                           id="<?= $itemIds['ADD_BASKET_LINK'] ?>"
                                                           href="javascript:void(0);">
                                                            <span><?= $arParams['MESS_BTN_ADD_TO_BASKET'] ?></span>
                                                        </a>
                                                        <?
                                                    }

                                                    if ($showBuyBtn) {
                                                        ?>
                                                        <div class="product-item-detail-info-container">
                                                            <a class="btn <?= $buyButtonClassName ?> product-item-detail-buy-button"
                                                               id="<?= $itemIds['BUY_LINK'] ?>"
                                                               href="javascript:void(0);">
                                                                <span><?= $arParams['MESS_BTN_BUY'] ?></span>
                                                            </a>
                                                        </div>
                                                        <?
                                                    }
                                                    ?>
                                                </div>
                                                    <a class="btn btn-default product-item-detail-buy-button" disabled
                                                       id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>"
                                                       href="javascript:void(0)"
                                                       rel="nofollow"
                                                       style="display: <?= (!$actualItem['CAN_BUY'] ? '' : 'none') ?>;">
                                                        <span><?= $arParams['MESS_NOT_AVAILABLE'] ?></span>
                                                    </a>
                                                <?
                                            } ?>
                                        <? } ?>
                                    </div>
                                </form>
                            </div>
                            <div class="product_meta">
                                <span class="sku_wrapper"><?= $arResult["PROPERTIES"]["ARTNUMBER"]["NAME"] ?>: <span
                                        class="sku"
                                        itemprop="sku"><?= $arResult["PROPERTIES"]["ARTNUMBER"]["VALUE"] ?></span></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="product-item-detail-pay-block">
                                <?
                                foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName) {
                                    switch ($blockName) {
                                        case 'rating':
                                            if ($arParams['USE_VOTE_RATING'] === 'Y') {
                                                ?>
                                                <div class="product-item-detail-info-container">
                                                    <?
                                                    $APPLICATION->IncludeComponent(
                                                        'bitrix:iblock.vote',
                                                        'stars',
                                                        array(
                                                            'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                                            'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                                                            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                                            'ELEMENT_ID' => $arResult['ID'],
                                                            'ELEMENT_CODE' => '',
                                                            'MAX_VOTE' => '5',
                                                            'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
                                                            'SET_STATUS_404' => 'N',
                                                            'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
                                                            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                                            'CACHE_TIME' => $arParams['CACHE_TIME']
                                                        ),
                                                        $component,
                                                        array('HIDE_ICONS' => 'Y')
                                                    );
                                                    ?>
                                                </div>
                                                <?
                                            }

                                            break;


                                        case 'quantityLimit':
                                            if ($arParams['SHOW_MAX_QUANTITY'] !== 'N') {
                                                if ($haveOffers) {
                                                    ?>
                                                    <div class="product-item-detail-info-container"
                                                         id="<?= $itemIds['QUANTITY_LIMIT'] ?>" style="display: none;">
                                                        <div class="product-item-detail-info-container-title">
                                                            <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
                                                            <span class="product-item-quantity"
                                                                  data-entity="quantity-limit-value"></span>
                                                        </div>
                                                    </div>
                                                    <?
                                                } else {
                                                    if (
                                                        $measureRatio
                                                        && (float)$actualItem['CATALOG_QUANTITY'] > 0
                                                        && $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
                                                        && $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
                                                    ) {
                                                        ?>
                                                        <div class="product-item-detail-info-container"
                                                             id="<?= $itemIds['QUANTITY_LIMIT'] ?>">
                                                            <div class="product-item-detail-info-container-title">
                                                                <?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
															<span class="product-item-quantity"
                                                                  data-entity="quantity-limit-value">
																<?
                                                                if ($arParams['SHOW_MAX_QUANTITY'] === 'M') {
                                                                    if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR']) {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                                                    } else {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                                                    }
                                                                } else {
                                                                    echo $actualItem['CATALOG_QUANTITY'] . ' ' . $actualItem['ITEM_MEASURE']['TITLE'];
                                                                }
                                                                ?>
															</span>
                                                            </div>
                                                        </div>
                                                        <?
                                                    }
                                                }
                                            }

                                            break;

                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="woocommerce">
                <div class="product">
                    <div class="woocommerce-tabs wc-tabs-wrapper" id="<?= $itemIds['TABS_ID'] ?>">
                        <ul class="tabs wc-tabs">
                            <?
                            if ($showDescription) {
                                ?>
                                <li class="description_tab active" data-entity="tab"
                                    data-value="description">
                                    <a href="javascript:void(0);">
                                        <span><?= $arParams['MESS_DESCRIPTION_TAB'] ?></span>
                                    </a>
                                </li>
                                <?
                            }
                            if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS']) {
                                ?>
                                <li class="additional_information_tab" data-entity="tab" data-value="properties">
                                    <a href="javascript:void(0);">
                                        <span><?= $arParams['MESS_PROPERTIES_TAB'] ?></span>
                                    </a>
                                </li>
                                <?
                            }

                            if ($arParams['USE_COMMENTS'] === 'Y') {
                                ?>
                                <li class="reviews_tab" data-entity="tab" data-value="comments">
                                    <a href="javascript:void(0);">
                                        <span><?= $arParams['MESS_COMMENTS_TAB'] ?></span>
                                    </a>
                                </li>
                                <?
                            }
                            ?>
                        </ul>
                        <div id="<?= $itemIds['TAB_CONTAINERS_ID'] ?>">
                            <?
                            if ($showDescription) {
                                ?>
                                <div
                                    class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab active"
                                    data-entity="tab-container"
                                    data-value="description"
                                    itemprop="description">
                                    <?
                                    if (
                                        $arResult['PREVIEW_TEXT'] != ''
                                        && (
                                            $arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
                                            || ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
                                        )
                                    ) {
                                        echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>' . $arResult['PREVIEW_TEXT'] . '</p>';
                                    }

                                    if ($arResult['DETAIL_TEXT'] != '') {
                                        echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>' . $arResult['DETAIL_TEXT'] . '</p>';
                                    }
                                    ?>
                                </div>
                                <?
                            }

                            if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS']) {
                                ?>
                                <div
                                    class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab"
                                    data-entity="tab-container"
                                    data-value="properties">
                                    <?
                                    if (!empty($arResult['DISPLAY_PROPERTIES'])) {
                                        ?>
                                        <dl class="product-item-detail-properties">
                                            <?
                                            foreach ($arResult['DISPLAY_PROPERTIES'] as $property) {
                                                ?>
                                                <dt><?= $property['NAME'] ?></dt>
                                                <dd><?= (
                                                    is_array($property['DISPLAY_VALUE'])
                                                        ? implode(' / ', $property['DISPLAY_VALUE'])
                                                        : $property['DISPLAY_VALUE']
                                                    ) ?>
                                                </dd>
                                                <?
                                            }
                                            unset($property);
                                            ?>
                                        </dl>
                                        <?
                                    }

                                    if ($arResult['SHOW_OFFERS_PROPS']) {
                                        ?>
                                        <dl class="product-item-detail-properties"
                                            id="<?= $itemIds['DISPLAY_PROP_DIV'] ?>"></dl>
                                        <?
                                    }
                                    ?>
                                </div>
                                <?
                            }

                            if ($arParams['USE_COMMENTS'] === 'Y') {
                                ?>
                                <div
                                    class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab"
                                    data-entity="tab-container"
                                    data-value="comments" style="display: none;">
                                    <?
                                    $componentCommentsParams = array(
                                        'ELEMENT_ID' => $arResult['ID'],
                                        'ELEMENT_CODE' => '',
                                        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                        'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
                                        'URL_TO_COMMENT' => '',
                                        'WIDTH' => '',
                                        'COMMENTS_COUNT' => '5',
                                        'BLOG_USE' => $arParams['BLOG_USE'],
                                        'FB_USE' => $arParams['FB_USE'],
                                        'FB_APP_ID' => $arParams['FB_APP_ID'],
                                        'VK_USE' => $arParams['VK_USE'],
                                        'VK_API_ID' => $arParams['VK_API_ID'],
                                        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                        'CACHE_TIME' => $arParams['CACHE_TIME'],
                                        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                                        'BLOG_TITLE' => '',
                                        'BLOG_URL' => $arParams['BLOG_URL'],
                                        'PATH_TO_SMILE' => '',
                                        'EMAIL_NOTIFY' => $arParams['BLOG_EMAIL_NOTIFY'],
                                        'AJAX_POST' => 'Y',
                                        'SHOW_SPAM' => 'Y',
                                        'SHOW_RATING' => 'Y',
                                        'FB_TITLE' => '',
                                        'FB_USER_ADMIN_ID' => '',
                                        'FB_COLORSCHEME' => 'light',
                                        'FB_ORDER_BY' => 'reverse_time',
                                        'VK_TITLE' => '',
                                        'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME']
                                    );
                                    if (isset($arParams["USER_CONSENT"]))
                                        $componentCommentsParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
                                    if (isset($arParams["USER_CONSENT_ID"]))
                                        $componentCommentsParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
                                    if (isset($arParams["USER_CONSENT_IS_CHECKED"]))
                                        $componentCommentsParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
                                    if (isset($arParams["USER_CONSENT_IS_LOADED"]))
                                        $componentCommentsParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];
                                    $APPLICATION->IncludeComponent(
                                        'bitrix:catalog.comments',
                                        '',
                                        $componentCommentsParams,
                                        $component,
                                        array('HIDE_ICONS' => 'Y')
                                    );
                                    ?>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Top tabs-->
        <div class="product-item-detail-tabs-container-fixed hidden-xs" id="<?= $itemIds['TABS_PANEL_ID'] ?>">
            <ul class="product-item-detail-tabs-list">
                <?
                if ($showDescription) {
                    ?>
                    <li class="product-item-detail-tab active" data-entity="tab" data-value="description">
                        <a href="javascript:void(0);" class="product-item-detail-tab-link">
                            <span><?= $arParams['MESS_DESCRIPTION_TAB'] ?></span>
                        </a>
                    </li>
                    <?
                }

                if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS']) {
                    ?>
                    <li class="product-item-detail-tab" data-entity="tab" data-value="properties">
                        <a href="javascript:void(0);" class="product-item-detail-tab-link">
                            <span><?= $arParams['MESS_PROPERTIES_TAB'] ?></span>
                        </a>
                    </li>
                    <?
                }

                if ($arParams['USE_COMMENTS'] === 'Y') {
                    ?>
                    <li class="product-item-detail-tab" data-entity="tab" data-value="comments">
                        <a href="javascript:void(0);" class="product-item-detail-tab-link">
                            <span><?= $arParams['MESS_COMMENTS_TAB'] ?></span>
                        </a>
                    </li>
                    <?
                }
                ?>
            </ul>
        </div>

        <meta itemprop="name" content="<?= $name ?>"/>
        <meta itemprop="category" content="<?= $arResult['CATEGORY_PATH'] ?>"/>
        <?
        if ($haveOffers) {
            foreach ($arResult['JS_OFFERS'] as $offer) {
                $currentOffersList = array();

                if (!empty($offer['TREE']) && is_array($offer['TREE'])) {
                    foreach ($offer['TREE'] as $propName => $skuId) {
                        $propId = (int)substr($propName, 5);

                        foreach ($skuProps as $prop) {
                            if ($prop['ID'] == $propId) {
                                foreach ($prop['VALUES'] as $propId => $propValue) {
                                    if ($propId == $skuId) {
                                        $currentOffersList[] = $propValue['NAME'];
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }

                $offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
                ?>
                <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?= htmlspecialcharsbx(implode('/', $currentOffersList)) ?>"/>
				<meta itemprop="price" content="<?= $offerPrice['RATIO_PRICE'] ?>"/>
				<meta itemprop="priceCurrency" content="<?= $offerPrice['CURRENCY'] ?>"/>
				<link itemprop="availability"
                      href="http://schema.org/<?= ($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>"/>
			</span>
                <?
            }

            unset($offerPrice, $currentOffersList);
        } else {
            ?>
            <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?= $price['RATIO_PRICE'] ?>"/>
			<meta itemprop="priceCurrency" content="<?= $price['CURRENCY'] ?>"/>
			<link itemprop="availability"
                  href="http://schema.org/<?= ($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock') ?>"/>
		</span>
            <?
        }
        ?>
    </div>
<?
if ($haveOffers) {
    $offerIds = array();
    $offerCodes = array();

    $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

    foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer) {
        $offerIds[] = (int)$jsOffer['ID'];
        $offerCodes[] = $jsOffer['CODE'];

        $fullOffer = $arResult['OFFERS'][$ind];
        $measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

        $strAllProps = '';
        $strMainProps = '';
        $strPriceRangesRatio = '';
        $strPriceRanges = '';

        if ($arResult['SHOW_OFFERS_PROPS']) {
            if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
                foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property) {
                    $current = '<dt>' . $property['NAME'] . '</dt><dd>' . (
                        is_array($property['VALUE'])
                            ? implode(' / ', $property['VALUE'])
                            : $property['VALUE']
                        ) . '</dd>';
                    $strAllProps .= $current;

                    if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']])) {
                        $strMainProps .= $current;
                    }
                }

                unset($current);
            }
        }

        if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1) {
            $strPriceRangesRatio = '(' . Loc::getMessage(
                    'CT_BCE_CATALOG_RATIO_PRICE',
                    array('#RATIO#' => ($useRatio
                            ? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
                            : '1'
                        ) . ' ' . $measureName)
                ) . ')';

            foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range) {
                if ($range['HASH'] !== 'ZERO-INF') {
                    $itemPrice = false;

                    foreach ($jsOffer['ITEM_PRICES'] as $itemPrice) {
                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH']) {
                            break;
                        }
                    }

                    if ($itemPrice) {
                        $strPriceRanges .= '<dt>' . Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_FROM',
                                array('#FROM#' => $range['SORT_FROM'] . ' ' . $measureName)
                            ) . ' ';

                        if (is_infinite($range['SORT_TO'])) {
                            $strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                        } else {
                            $strPriceRanges .= Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_TO',
                                array('#TO#' => $range['SORT_TO'] . ' ' . $measureName)
                            );
                        }

                        $strPriceRanges .= '</dt><dd>' . ($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']) . '</dd>';
                    }
                }
            }

            unset($range, $itemPrice);
        }

        $jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
        $jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
        $jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
        $jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
    }

    $templateData['OFFER_IDS'] = $offerIds;
    $templateData['OFFER_CODES'] = $offerCodes;
    unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

    $jsParams = array(
        'CONFIG' => array(
            'USE_CATALOG' => $arResult['CATALOG'],
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_PRICE' => true,
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
            'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
            'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
            'OFFER_GROUP' => $arResult['OFFER_GROUP'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
            'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
            'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
            'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
            'USE_STICKERS' => true,
            'USE_SUBSCRIBE' => $showSubscribe,
            'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
            'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
            'ALT' => $alt,
            'TITLE' => $title,
            'MAGNIFIER_ZOOM_PERCENT' => 200,
            'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
            'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
                ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
                : null
        ),
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
        'VISUAL' => $itemIds,
        'DEFAULT_PICTURE' => array(
            'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
            'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
        ),
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'ACTIVE' => $arResult['ACTIVE'],
            'NAME' => $arResult['~NAME'],
            'CATEGORY' => $arResult['CATEGORY_PATH']
        ),
        'BASKET' => array(
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'BASKET_URL' => $arParams['BASKET_URL'],
            'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
            'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
            'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
        ),
        'OFFERS' => $arResult['JS_OFFERS'],
        'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
        'TREE_PROPS' => $skuProps
    );
} else {
    $emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
    if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties) {
        ?>
        <div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
            <?
            if (!empty($arResult['PRODUCT_PROPERTIES_FILL'])) {
                foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo) {
                    ?>
                    <input type="hidden" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
                           value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
                    <?
                    unset($arResult['PRODUCT_PROPERTIES'][$propId]);
                }
            }

            $emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
            if (!$emptyProductProperties) {
                ?>
                <table>
                    <?
                    foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo) {
                        ?>
                        <tr>
                            <td><?= $arResult['PROPERTIES'][$propId]['NAME'] ?></td>
                            <td>
                                <?
                                if (
                                    $arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
                                    && $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
                                ) {
                                    foreach ($propInfo['VALUES'] as $valueId => $value) {
                                        ?>
                                        <label>
                                            <input type="radio"
                                                   name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]"
                                                   value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? '"checked"' : '') ?>>
                                            <?= $value ?>
                                        </label>
                                        <br>
                                        <?
                                    }
                                } else {
                                    ?>
                                    <select name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propId ?>]">
                                        <?
                                        foreach ($propInfo['VALUES'] as $valueId => $value) {
                                            ?>
                                            <option
                                                value="<?= $valueId ?>" <?= ($valueId == $propInfo['SELECTED'] ? '"selected"' : '') ?>>
                                                <?= $value ?>
                                            </option>
                                            <?
                                        }
                                        ?>
                                    </select>
                                    <?
                                }
                                ?>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            }
            ?>
        </div>
        <?
    }

    $jsParams = array(
        'CONFIG' => array(
            'USE_CATALOG' => $arResult['CATALOG'],
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
            'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
            'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
            'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
            'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
            'USE_STICKERS' => true,
            'USE_SUBSCRIBE' => $showSubscribe,
            'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
            'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
            'ALT' => $alt,
            'TITLE' => $title,
            'MAGNIFIER_ZOOM_PERCENT' => 200,
            'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
            'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
            'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
                ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
                : null
        ),
        'VISUAL' => $itemIds,
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'ACTIVE' => $arResult['ACTIVE'],
            'PICT' => reset($arResult['MORE_PHOTO']),
            'NAME' => $arResult['~NAME'],
            'SUBSCRIPTION' => true,
            'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
            'ITEM_PRICES' => $arResult['ITEM_PRICES'],
            'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
            'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
            'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
            'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
            'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
            'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
            'SLIDER' => $arResult['MORE_PHOTO'],
            'CAN_BUY' => $arResult['CAN_BUY'],
            'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
            'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
            'MAX_QUANTITY' => $arResult['CATALOG_QUANTITY'],
            'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
            'CATEGORY' => $arResult['CATEGORY_PATH']
        ),
        'BASKET' => array(
            'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
            'EMPTY_PROPS' => $emptyProductProperties,
            'BASKET_URL' => $arParams['BASKET_URL'],
            'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
            'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
        )
    );
    unset($emptyProductProperties);
}

if ($arParams['DISPLAY_COMPARE']) {
    $jsParams['COMPARE'] = array(
        'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
        'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
        'COMPARE_PATH' => $arParams['COMPARE_PATH']
    );
}
?>
    <script>
        BX.message({
            ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
            TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
            TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
            BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
            BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
            BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
            BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
            BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
            TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
            COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
            COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
            COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
            BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
            PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
            PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
            RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
            RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
            SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
        });

        var <?=$obName?> =
        new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
    </script>
<?
unset($actualItem, $itemIds, $jsParams);
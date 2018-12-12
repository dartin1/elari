<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @var array $arUrls */
/** @var array $arHeaders */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
    ShowError($arResult["ERROR_MESSAGE"]);

if ($normalCount > 0):
    ?>
    <div id="basket_items_list" class="table-responsive">
        <table class="shop_table cart" cellspacing="0" id="basket_items">
            <thead>
            <tr>

                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">Товар</th>
                <th class="product-price">Цена</th>
                <th class="product-quantity">Количество</th>
                <th class="product-subtotal">Всего</th>
                <th class="product-remove">&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            <?

            foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):

                if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
                    ?>
                    <tr class="cart_item" id="<?= $arItem["ID"] ?>"
                        data-item-name="<?= $arItem["NAME"] ?>"
                        data-item-brand="<?= $arItem[$arParams['BRAND_PROPERTY'] . "_VALUE"] ?>"
                        data-item-price="<?= $arItem["PRICE"] ?>"
                        data-item-currency="<?= $arItem["CURRENCY"] ?>"
                    >

                        <td class="product-thumbnail">
                            <?
                            if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
                                $url = $arItem["PREVIEW_PICTURE_SRC"];
                            elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
                                $url = $arItem["DETAIL_PICTURE_SRC"];
                            else:
                                $url = $templateFolder . "/images/no_photo.png";
                            endif;

                            if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?><a
                                href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?endif;
                                ?>
                                <img width="180" height="180" src="<?= $url ?>"
                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?></a><?endif;
                        ?>
                        </td>

                        <td class="product-name">
                            <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?><a
                                href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?endif;
                                ?>
                                <?= $arItem["NAME"] ?>
                                <? if (strlen($arItem["DETAIL_PAGE_URL"]) > 0): ?></a><?endif;
                        ?>
                            <? foreach ($arItem["PROPS"] as $val): ?>
                                <dl class="variation">
                                    <dt class="variation-Colors"><?= $val["NAME"] ?></dt>
                                    <dd class="variation-Colors"><p><?= $val["VALUE"] ?></p>
                                    </dd>
                                </dl>
                            <? endforeach; ?>
                        </td>

                        <td class="product-price">
                            <span class="woocommerce-Price-amount amount" id="current_price_<?= $arItem["ID"] ?>">
                                <?= $arItem["PRICE_FORMATED"] ?>
                            </span>
                        </td>

                        <?
                        $ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
                        $useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
                        $useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
                        ?>
                        <td class="product-quantity">
                            <div class="quantity">
                                <input type="number" step="1" min="0" max="" id="QUANTITY_INPUT_<?= $arItem["ID"] ?>"
                                       onchange="updateQuantity('QUANTITY_INPUT_<?= $arItem["ID"] ?>', '<?= $arItem["ID"] ?>', <?= $ratio ?>, <?= $useFloatQuantityJS ?>)"
                                       name="QUANTITY_INPUT_<?= $arItem["ID"] ?>" value="<?= $arItem["QUANTITY"] ?>"
                                       title="Кол-во" class="input-text qty text" size="4" pattern="[0-9]*"
                                       inputmode="numeric">
                            </div>
                            <input type="hidden" id="QUANTITY_<?= $arItem['ID'] ?>"
                                   name="QUANTITY_<?= $arItem['ID'] ?>" value="<?= $arItem["QUANTITY"] ?>"/>
                        </td>

                        <td class="product-subtotal">
                            <span class="woocommerce-Price-amount amount" id="sum_<?= $arItem["ID"] ?>">
                                <?= $arItem["SUM"]; ?>
                            </span>
                        </td>

                        <td class="product-remove">
                            <a href="<?= str_replace("#ID#", $arItem["ID"], $arUrls["delete"]) ?>"
                               onclick="return deleteProductRow(this)" class="remove" title="Удалить эту позицию">×</a>
                        </td>
                    </tr>
                    <?
                endif;
            endforeach;
            ?>

            </tbody>
        </table>
        <div class="woocommerce-page">
            <table class="shop_table cart">
                <tr>
                    <td colspan="6" class="actions">
                        <div class="coupon" id="coupons_block">
                            <?
                            if ($arParams["HIDE_COUPON"] != "Y") {
                                ?>
                                <label for="coupon_code">Купон:</label>
                                <input type="text" id="coupon" name="COUPON" class="input-text" value=""
                                       placeholder="Код купона" onchange="enterCoupon();">
                                <a
                                    class="button apply-coupon" href="javascript:void(0)" onclick="enterCoupon();"
                                    title="<?= GetMessage('SALE_COUPON_APPLY_TITLE'); ?>"><?= GetMessage('SALE_COUPON_APPLY'); ?></a>
                                <?
                                if (!empty($arResult['COUPON_LIST'])) {
                                    foreach ($arResult['COUPON_LIST'] as $oneCoupon) {
                                        $couponClass = 'disabled';
                                        switch ($oneCoupon['STATUS']) {
                                            case DiscountCouponsManager::STATUS_NOT_FOUND:
                                            case DiscountCouponsManager::STATUS_FREEZE:
                                                $couponClass = 'bad';
                                                break;
                                            case DiscountCouponsManager::STATUS_APPLYED:
                                                $couponClass = 'good';
                                                break;
                                        }
                                        ?>
                                        <div class="bx_ordercart_coupon" style="text-align: left"><input disabled
                                                                                                         readonly
                                                                                                         type="text"
                                                                                                         name="OLD_COUPON[]"
                                                                                                         value="<?= htmlspecialcharsbx($oneCoupon['COUPON']); ?>"
                                                                                                         class="<? echo $couponClass; ?>"><span
                                            class="<? echo $couponClass; ?>"
                                            data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span>
                                        <a href="javascript:void(0)"
                                           data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"
                                           onclick="deleteCoupon()">×</a>
                                        <div class="bx_ordercart_coupon_notes"><?
                                            if (isset($oneCoupon['CHECK_CODE_TEXT'])) {
                                                echo(is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
                                            }
                                            ?></div></div><?
                                    }
                                    unset($couponClass, $oneCoupon);
                                }
                            } else {
                                ?>&nbsp;<?
                            }
                            ?>
                        </div>
                        <a href="javascript:void(0)" onclick="updateBasket();" style="float: right; width: auto"
                           class="button"><?= GetMessage("SALE_REFRESH") ?></a>
                    </td>
                </tr>
            </table>
        </div>
        <input type="hidden" id="column_headers" value="<?= htmlspecialcharsbx(implode($arHeaders, ",")) ?>"/>
        <input type="hidden" id="offers_props"
               value="<?= htmlspecialcharsbx(implode($arParams["OFFERS_PROPS"], ",")) ?>"/>
        <input type="hidden" id="action_var" value="<?= htmlspecialcharsbx($arParams["ACTION_VARIABLE"]) ?>"/>
        <input type="hidden" id="quantity_float" value="<?= ($arParams["QUANTITY_FLOAT"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="price_vat_show_value"
               value="<?= ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="hide_coupon" value="<?= ($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="use_prepayment" value="<?= ($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N" ?>"/>
        <input type="hidden" id="auto_calculation" value="<?= ($arParams["AUTO_CALCULATION"] == "N") ? "N" : "Y" ?>"/>
    </div>
    <div class="cart-collaterals">

        <div class="cart_totals ">

            <h2>Сумма в корзине</h2>

            <table cellspacing="0" class="shop_table shop_table_responsive">

                <tbody>
                <tr class="cart-subtotal">
                    <? $showTotalPrice = (float)$arResult["DISCOUNT_PRICE_ALL"] > 0; ?>
                    <? if ($showTotalPrice) { ?>
                        <th>Сумма</th>
                        <td data-title="Сумма">
                        <span class="woocommerce-Price-amount amount"
                              id="PRICE_WITHOUT_DISCOUNT"><?= ($showTotalPrice ? $arResult["PRICE_WITHOUT_DISCOUNT"] : ''); ?></span>
                        </td>
                    <? } ?>
                </tr>

                <tr class="order-total">
                    <th>Всего</th>
                    <td data-title="Итого">
                        <strong>
                                <span class="woocommerce-Price-amount amount"
                                      id="allSum_FORMATED"><?= str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"]) ?></span>
                        </strong>
                    </td>
                </tr>

                </tbody>
            </table>

            <div class="wc-proceed-to-checkout">

                <a href="javascript:void(0)" onclick="checkOut();" class="checkout-button button alt wc-forward">
                    <?= GetMessage("SALE_ORDER") ?></a>
            </div>
        </div>
    </div>
    <?
else:
    ?>
    <div id="basket_items_list">
        <table>
            <tbody>
            <tr>
                <td style="text-align:center">
                    <div class=""><?= GetMessage("SALE_NO_ITEMS"); ?></div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <?
endif;
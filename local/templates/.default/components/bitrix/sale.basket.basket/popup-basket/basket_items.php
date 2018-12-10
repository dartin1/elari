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
    <div id="basket_items_list">
        <table class="festi-cart-list">
            <tbody>
            <?
            foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
                if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
                    if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
                        $url = $arItem["PREVIEW_PICTURE_SRC"];
                    elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
                        $url = $arItem["DETAIL_PICTURE_SRC"];
                    else:
                        $url = $templateFolder . "/images/no_photo.png";
                    endif;
                    ?>
                    <tr class="festi-cart-item ">
                        <td colspan="2" class="festi-cart-product-img">
                            <a class="festi-cart-img" href="<?=$arItem["DETAIL_PAGE_URL"] ?>">
                                <img width="94" height="94" src="<?=$url ?>">
                            </a>
                        </td>
                        <td class="festi-cart-product-title">
                            <a class="festi-cart-title"
                               href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?=$arItem["NAME"] ?></a>
                            <br>
                            <span
                                class="festi-cart-product-variation-attribut">Цвет: <?=$arItem["PROPS"][0]["VALUE"] ?></span>
                            <span class="festi-cart-product-count"><?=$arItem["QUANTITY"] ?> x</span>
                            <span class="festi-cart-product-price"><span
                                    class="woocommerce-Price-amount amount"><?=$arItem["FULL_PRICE_FORMATED"] ?></span>
                            </span>
                        </td>
                    </tr>
                    <?
                endif;
            endforeach;
            ?>


            </tbody>
        </table>
    </div>
    <div class="festi-cart-total">Всего: <span
            class="woocommerce-Price-amount amount"><?=$arResult["allSum_FORMATED"] ?></span></div>
    <p class="festi-cart-buttons">
        <a class="festi-cart-view-cart" href="<?=SITE_DIR?>cart/">В корзину</a>
        <a class="festi-cart-checkout" href="<?=$arParams["PATH_TO_ORDER"]?>">Оформить заказ</a>

    </p>
<? endif; ?>
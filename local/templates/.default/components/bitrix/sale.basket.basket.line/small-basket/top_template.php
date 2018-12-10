<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
<a href="<?= $arParams['PATH_TO_BASKET'] ?>"><i class="th-icon th-i-cart"></i><span class="themo_cart_item_count"><?=$arResult['NUM_PRODUCTS'] ?></span></a>
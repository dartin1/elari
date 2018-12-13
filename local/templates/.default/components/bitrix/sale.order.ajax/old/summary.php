<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$bDefaultColumns = $arResult["GRID"]["DEFAULT_COLUMNS"];
$colspan = ($bDefaultColumns) ? count($arResult["GRID"]["HEADERS"]) : count($arResult["GRID"]["HEADERS"]) - 1;
$bPropsColumn = false;
$bUseDiscount = false;
$bPriceType = false;
$bShowNameWithPicture = ($bDefaultColumns) ? true : false; // flat to show name and picture column in one column
?>
<h3 id="order_review_heading"><?=GetMessage("SALE_PRODUCTS_SUMMARY");?></h3>


<div id="order_review" class="woocommerce-checkout-review-order">
	<table class="shop_table woocommerce-checkout-review-order-table">
		<thead>
		<tr>
			<th class="product-name">Товар</th>
			<th class="product-total">Всего</th>
		</tr>
		</thead>
		<tbody>
		<?foreach ($arResult["GRID"]["ROWS"] as $k => $arData):?>
		<tr class="cart_item">
			<td class="product-name">
				<?=$arData["data"]["NAME"] ?><strong class="product-quantity">× <?=$arData["data"]["QUANTITY"] ?></strong>							<dl class="variation">
					<dt class="variation-Colors"><?=$arData["data"]["PROPS"][0]["NAME"] ?>:</dt>
					<dd class="variation-Colors"><p><?=$arData["data"]["PROPS"][0]["VALUE"] ?></p>
					</dd>
				</dl>
			</td>
			<td class="product-total">
				<span class="woocommerce-Price-amount amount"><?=$arData["data"]["PRICE_FORMATED"]?></span>
			</td>
		</tr>
		<?endforeach; ?>
		</tbody>
		<tfoot>
		<tr class="order-total">
			<th>Всего</th>
			<td><strong><span class="woocommerce-Price-amount amount"><?=$arResult["ORDER_PRICE_FORMATED"]?></span></strong> </td>
		</tr>
		</tfoot>
	</table>
	<? include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php"); ?>
</div>


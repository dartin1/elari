<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if (!empty($arResult["ORDER"])) {
    ?>
    <div class="woocommerce">

        <p class="woocommerce-thankyou-order-received">Спасибо. Ваш заказ был принят.</p>

        <ul class="woocommerce-thankyou-order-details order_details">
            <li class="order">
                Номер заказа:<strong><?= $arResult["ORDER"]["ACCOUNT_NUMBER"] ?></strong>
            </li>
            <li class="date">
                Дата:<strong><?= $arResult["ORDER"]["DATE_INSERT"] ?></strong>
            </li>
            <li class="total">
                Всего:<strong><span
                        class="woocommerce-Price-amount amount"><?= CurrencyFormat($arResult["ORDER"]["PRICE"], $arResult["ORDER"]["CURRENCY"]); ?></span></strong>
            </li>
            <li class="method">
                Способ оплаты:<strong><?= $arResult["PAY_SYSTEM"]["NAME"] ?></strong>
            </li>
        </ul>
        <div class="clear"></div>

        <?
        $basket = \Bitrix\Sale\Order::load($arResult["ORDER_ID"])->getBasket();
        ?>
        <p>Оплата наличными при доставке заказа.</p>
        <h2>Информация о заказе</h2>
        <table class="shop_table order_details">
            <thead>
            <tr>
                <th class="product-name">Товар</th>
                <th class="product-total">Всего</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($basket as $basketItem) {
                $basketPropertyCollection = $basketItem->getPropertyCollection();
                $basketPropertyValues = $basketPropertyCollection->getPropertyValues();
                ?>
                <tr class="order_item">
                    <td class="product-name">
                        <a href="<?= $basketItem->getField('DETAIL_PAGE_URL'); ?>"><?= $basketItem->getField('NAME'); ?></a>
                        <strong class="product-quantity">× <?= $basketItem->getQuantity() ?></strong>
                        <dl class="variation">
                            <dt class="variation-pa_colors"><?= $basketPropertyValues["COLOR_REF"]["NAME"] ?>:</dt>
                            <dd class="variation-pa_colors"><p><?= $basketPropertyValues["COLOR_REF"]["VALUE"] ?></p>
                            </dd>
                        </dl>
                    </td>
                    <td class="product-total">
                        <span
                            class="woocommerce-Price-amount amount"><?= CurrencyFormat($basketItem->getPrice(), $basketItem->getCurrency()); ?>
                        </span>
                    </td>
                </tr>
            <? } ?>
            </tbody>
            <tfoot>
            <tr>
                <th scope="row">Сумма:</th>
                <td>
                    <span
                        class="woocommerce-Price-amount amount"><?= CurrencyFormat($basket->getPrice(), $arResult["ORDER"]["CURRENCY"]) ?>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">Способ оплаты:</th>
                <td><?= $arResult["PAY_SYSTEM"]["NAME"] ?></td>
            </tr>
            <tr>
                <th scope="row">Всего:</th>
                <td>
                    <span
                        class="woocommerce-Price-amount amount"><?= CurrencyFormat($arResult["ORDER"]["PRICE"], $arResult["ORDER"]["CURRENCY"]); ?>
                    </span>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>

    <?

} else {
    ?>
    <b><?= GetMessage("SOA_TEMPL_ERROR_ORDER") ?></b><br/><br/>

    <table class="sale_order_full_table">
        <tr>
            <td>
                <?= GetMessage("SOA_TEMPL_ERROR_ORDER_LOST", Array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"])) ?>
                <?= GetMessage("SOA_TEMPL_ERROR_ORDER_LOST1") ?>
            </td>
        </tr>
    </table>
    <?
}
?>


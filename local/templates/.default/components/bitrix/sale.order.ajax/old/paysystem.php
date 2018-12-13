<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<script type="text/javascript">
    function changePaySystem(param) {
        if (BX("account_only") && BX("account_only").value == 'Y') // PAY_CURRENT_ACCOUNT checkbox should act as radio
        {
            if (param == 'account') {
                if (BX("PAY_CURRENT_ACCOUNT")) {
                    BX("PAY_CURRENT_ACCOUNT").checked = true;
                    BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
                    BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');

                    // deselect all other
                    var el = document.getElementsByName("PAY_SYSTEM_ID");
                    for (var i = 0; i < el.length; i++) {
                        el[i].checked = false;
                    }
                }
            }
            else {
                BX("PAY_CURRENT_ACCOUNT").checked = false;
                BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
                BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
            }
        }
        else if (BX("account_only") && BX("account_only").value == 'N') {
            if (param == 'account') {
                if (BX("PAY_CURRENT_ACCOUNT")) {
                    BX("PAY_CURRENT_ACCOUNT").checked = !BX("PAY_CURRENT_ACCOUNT").checked;

                    if (BX("PAY_CURRENT_ACCOUNT").checked) {
                        BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
                        BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
                    }
                    else {
                        BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
                        BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
                    }
                }
            }
        }

        submitForm();
    }
</script>
<div id="payment" class="woocommerce-checkout-payment">
    <input type="hidden" id="account_only" value="<?= $accountOnly ?>"/>
    <ul class="wc_payment_methods payment_methods methods">
        <? foreach ($arResult["PAY_SYSTEM"] as $arPaySystem): ?>
            <li class="wc_payment_method payment_method_cod">
                <input type="radio" class="input-radio" id="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>"
                       name="PAY_SYSTEM_ID"
                       value="<?= $arPaySystem["ID"] ?>"
                    <? if ($arPaySystem["CHECKED"] == "Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"] == "Y")) echo " checked=\"checked\""; ?>
                       onclick="changePaySystem();">

                <label for="ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>" style="display: inline-block"
                       onclick="BX('ID_PAY_SYSTEM_ID_<?= $arPaySystem["ID"] ?>').checked=true;changePaySystem();">
                    <?
                    if (count($arPaySystem["PSA_LOGOTIP"]) > 0):
                        $arFileTmp = CFile::ResizeImageGet(
                            $arPaySystem["PSA_LOGOTIP"]['ID'],
                            array("width" => "95", "height" => "55"),
                            BX_RESIZE_IMAGE_PROPORTIONAL,
                            true
                        );
                        $imgUrl = $arFileTmp["src"];
                    else:
                        $imgUrl = $templateFolder . "/images/logo-default-ps.gif";
                    endif;
                    ?>
                    <?= $arPaySystem["PSA_NAME"]; ?>
                    <img src="<?= $imgUrl ?>" alt="<?= $arPaySystem["PSA_NAME"]; ?>">
                </label>
                <div
                    class="payment_box payment_method_cod" <? if (!($arPaySystem["CHECKED"] == "Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"] == "Y"))) echo " style='display:none'"; ?>>
                    <p><?= $arPaySystem["DESCRIPTION"] ?></p>
                </div>
            </li>
        <? endforeach; ?>
    </ul>
    <div class="form-row place-order">

        <input type="submit" class="button alt" onclick="submitForm('Y'); return false;" id="place_order"
               value="<?= GetMessage("SOA_TEMPL_BUTTON") ?>">

    </div>
</div>

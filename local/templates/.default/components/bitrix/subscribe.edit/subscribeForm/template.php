<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div id="subscribe-form">
    <section id="themo_conversion_form_1" class=" conversion-form ">
        <div class='container'>
            <div class="row">
                <div class="section-header col-xs-12 centered">
                    <h2><?= GetMessage("subscr_form_header") ?></h2>
                    <p><?= GetMessage("subscr_form_descr") ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="simple-conversion">
                        <div class="frm_forms  with_frm_style frm_style_formidable-style"
                             id="frm_form_3_container">
                            <?

                            foreach ($arResult["MESSAGE"] as $itemID => $itemValue)
                                echo ShowMessage(array("MESSAGE" => $itemValue, "TYPE" => "OK"));
                            foreach ($arResult["ERROR"] as $itemID => $itemValue)
                                echo ShowMessage(array("MESSAGE" => $itemValue, "TYPE" => "ERROR"));

                            //whether to show the forms
                            if ($arResult["ID"] == 0 && empty($_REQUEST["action"]) || CSubscription::IsAuthorized($arResult["ID"])) {
                                //show confirmation form
                                if ($arResult["ID"] > 0 && $arResult["SUBSCRIPTION"]["CONFIRMED"] <> "Y") {
                                    include("confirmation.php");
                                } else {
                                    //setting section
                                    include("setting.php");
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
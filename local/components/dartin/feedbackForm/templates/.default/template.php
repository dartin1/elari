<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<section id="themo_service_block_split_1" class=" service-split ">
    <div class="container">
        <div class="row">
            <div class="section-header col-xs-12 centered">
                <h2><?= $arParams["NAME"] ?></h2>
                <p><?= $arParams["DESCRIPTION"] ?></p>
            </div>
        </div>
        <div class="row">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR . "include/contacts/contacts.php"
                )
            ); ?>
            <section class="contact-form col-sm-6">
                <div class="frm_forms  with_frm_style frm_style_formidable-style">
                    <form method="post" class="frm-show-form">
                        <div class="frm_form_fields ">
                            <fieldset>
                                <div class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                    <input type="text" id="field_xipbjr3" name="<?=$arResult["FIELD"][0]["NAME"]?>" <?=$arResult["FIELD"][0]["REQUIRED"] ?> placeholder="<?=$arResult["FIELD"][0]["VALUE"]?>">
                                </div>
                                <div class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                    <input type="text" id="field_jaehy83" value="" name="<?=$arResult["FIELD"][1]["NAME"]?>"  <?=$arResult["FIELD"][0]["REQUIRED"] ?> placeholder="<?=$arResult["FIELD"][1]["VALUE"]?>">
                                </div>
                                <div class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                    <textarea name="<?=$arResult["FIELD"][2]["NAME"]?>" id="field_kggkvh3" rows="5" placeholder="<?=$arResult["FIELD"][2]["VALUE"]?>"></textarea>
                                </div>
                                <input type="hidden" name="EVENT_NAME" value="<?=$arParams["EVENT_NAME"]?>">
                                <input type="hidden" name="IBLOCK_ID" value="<?=$arParams["IBLOCK_ID"]?>">
                                <input type="hidden" name="MAIL_TO" value="<?=$arParams["MAIL_TO"]?>">
                                <div class="frm_submit">
                                    <input type="submit" class="sendBtnJS" value="Отправить">
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

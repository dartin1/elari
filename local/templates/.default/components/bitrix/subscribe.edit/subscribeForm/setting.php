<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
//***********************************
//setting section
//***********************************
?>
<form action="<?= $arResult["FORM_ACTION"] ?>" method="post" class="frm-show-form">
    <? echo bitrix_sessid_post(); ?>
    <? foreach ($arResult["RUBRICS"] as $itemID => $itemValue): ?>
        <input type="checkbox" hidden name="RUB_ID[]" value="<?= $itemValue["ID"] ?>" checked/>
    <? endforeach; ?>
    <input type="radio" name="FORMAT" hidden value="text" checked/>
    <input type="hidden" name="PostAction" value="<? echo($arResult["ID"] > 0 ? "Update" : "Add") ?>"/>
    <input type="hidden" name="ID" value="<? echo $arResult["SUBSCRIPTION"]["ID"]; ?>"/>
    <div class="frm_form_fields ">
        <fieldset>
            <? /* ?>
											<div id="frm_field_16_container"
												 class="frm_form_field form-field  frm_none_container">
												<label for="field_qy05f8" class="frm_primary_label">Name
													<span class="frm_required"></span>
												</label>
												<input type="text" id="field_qy05f8" name="item_meta[16]"
													   value="" placeholder="Имя"/>
											</div>
											*/ ?>
            <div id="frm_field_17_container"
                 class="frm_form_field form-field  frm_required_field frm_none_container">
                <label for="field_3asv29"
                       class="frm_primary_label"><?= GetMessage("subscr_form_email_title") ?>
                    <span class="frm_required">*</span>
                </label>
                <input type="text" id="field_3asv29" name="EMAIL"
                       value="<?= $arResult["SUBSCRIPTION"]["EMAIL"] != "" ? $arResult["SUBSCRIPTION"]["EMAIL"] : $arResult["REQUEST"]["EMAIL"]; ?>"
                       placeholder="<?= GetMessage("subscr_form_email_title") ?>"/>
            </div>
            <? /* ?>
											<div id="frm_field_18_container"
												 class="frm_form_field form-field  frm_none_container">
												<label for="field_2ywico" class="frm_primary_label">Company
													Name
													<span class="frm_required"></span>
												</label>
												<input type="text" id="field_2ywico" name="item_meta[18]"
													   value="" placeholder="Название компании"/>


											</div>
 											*/ ?>
            <div class="frm_submit">
                <input type="submit" value="<?= GetMessage("subscr_form_button") ?>"/>
                <img class="frm_ajax_loading"
                     src="<?= SITE_TEMPLATE_PATH ?>/img/ajax_loader.gif"
                     alt="Sending" style="visibility:hidden;"/>

            </div>
        </fieldset>
    </div>
</form>

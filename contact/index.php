<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
    <div class="wrap" role="document">
        <div class="content">
            <div class="inner-container">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:map.google.view",
                    ".default",
                    array(
                        "API_KEY" => "",
                        "CONTROLS" => array(
                            0 => "SMALL_ZOOM_CONTROL",
                            1 => "TYPECONTROL",
                            2 => "SCALELINE",
                        ),
                        "INIT_MAP_TYPE" => "ROADMAP",
                        "MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.7383;s:10:\"google_lon\";d:37.5946;s:12:\"google_scale\";i:13;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:0:\"\";s:3:\"LON\";d:37.59597329101564;s:3:\"LAT\";d:55.74037772279539;}}}",
                        "MAP_HEIGHT" => "400",
                        "MAP_ID" => "",
                        "MAP_WIDTH" => "100%",
                        "OPTIONS" => array(),
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                ); ?>

                <style scoped="">
                    section#themo_service_block_split_1 {
                        padding-top: 40px;
                        padding-bottom: 65px
                    }</style>


                <div>
                    <section id="themo_service_block_split_1" class=" service-split ">
                        <div class="container">
                            <div class="row">
                                <div class="section-header col-xs-12 centered">
                                    <h2>"Перезвоните мне"</h2>
                                    <p>Оставьте свои контакты, и наш менеджер свяжется с вами</p>
                                </div><!-- /.section-header -->
                            </div><!-- /.row -->
                            <div class="row">
                                <section class="split-blocks col-sm-6">
                                    <div class="service-block">
                                        <div class="service-block service-block-0 hide-animation slideLeft">
                                            <div class="med-icon"><i
                                                    class="accent glyphicons glyphicons-address-book"></i></div>
                                            <div class="service-block-text"><h3>Контакты</h3>
                                                <p>Киев, улица Воздвиженская,&nbsp;29Б<br>
                                                    Ежедневно с 9:00 — 18:00<br>
                                                    Кроме выходных и праздничных дней</p>
                                                <p>(044) 391-04-00<br>
                                                    0 800 300&nbsp;245 — техподдержка</p>
                                                <p>Техподдержка:&nbsp;<a href="mailto:support@elari.ua" target="_blank"
                                                                         rel="nofollow">support@elari.ua<br>
                                                    </a>Для заказов:&nbsp;<a href="mailto:support@elari.ua"
                                                                             target="_blank" rel="nofollow">support@elari.ua</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </section><!-- /.contact-blocks -->
                                <section class="contact-form col-sm-6">
                                    <div class="frm_forms  with_frm_style frm_style_formidable-style"
                                         id="frm_form_5_container">
                                        <form enctype="multipart/form-data" method="post" class="frm-show-form "
                                              id="form_contact3">
                                            <div class="frm_form_fields ">
                                                <fieldset>

                                                    <input type="hidden" name="frm_action" value="create">
                                                    <input type="hidden" name="form_id" value="5">
                                                    <input type="hidden" name="frm_hide_fields_5" id="frm_hide_fields_5"
                                                           value="">
                                                    <input type="hidden" name="form_key" value="contact3">
                                                    <input type="hidden" name="item_meta[0]" value="">
                                                    <input type="hidden" id="frm_submit_entry_5"
                                                           name="frm_submit_entry_5" value="b03ac8aa56"><input
                                                        type="hidden" name="_wp_http_referer" value="/contact/">
                                                    <div id="frm_field_22_container"
                                                         class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                                        <label for="field_xipbjr3" class="frm_primary_label">Имя
                                                            <span class="frm_required">*</span>
                                                        </label>
                                                        <input type="text" id="field_xipbjr3" name="item_meta[22]"
                                                               value="" placeholder="Имя"
                                                               data-reqmsg="This field cannot be blank.">


                                                    </div>
                                                    <div id="frm_field_23_container"
                                                         class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                                        <label for="field_jaehy83" class="frm_primary_label">Email
                                                            <span class="frm_required">*</span>
                                                        </label>
                                                        <input type="text" id="field_jaehy83" name="item_meta[23]"
                                                               value="" placeholder="Email"
                                                               data-reqmsg="This field cannot be blank.">


                                                    </div>
                                                    <div id="frm_field_26_container"
                                                         class="frm_form_field form-field  frm_required_field frm_none_container frm_full">
                                                        <label for="field_kggkvh3" class="frm_primary_label">Сообщение
                                                            <span class="frm_required">*</span>
                                                        </label>
                                                        <textarea name="item_meta[26]" id="field_kggkvh3" rows="5"
                                                                  placeholder="Сообщение"
                                                                  data-reqmsg="This field cannot be blank."></textarea>


                                                    </div>
                                                    <input type="hidden" name="item_key" value="">
                                                    <div class="frm_submit">

                                                        <input type="submit" value="Отправить">
                                                        <img class="frm_ajax_loading"
                                                             src="http://elari.ua/wp-content/plugins/formidable/images/ajax_loader.gif"
                                                             alt="Sending" style="visibility:hidden;">

                                                    </div>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>

                                </section>
                            </div><!-- /.row --></div><!-- /.container --></section>
                </div>


            </div><!-- /.inner-container -->
        </div><!-- /.content -->
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
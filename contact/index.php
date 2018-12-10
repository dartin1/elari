<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
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

<? $APPLICATION->IncludeComponent(
    "dartin:feedbackForm",
    ".default",
    array(
        "IBLOCK_ID" => "7",
        "EVENT_NAME" => "FEEDBACK_FORM",
        "FIELDS" => array(
            "FIELD0" => array(
                0 => "Имя*",
                1 => "NAME",
                2 => "REQUIRED"
            ),
            "FIELD1" => array(
                0 => "Email*",
                1 => "EMAIL",
                2 => "REQUIRED"
            ),
            "FIELD2" => array(
                0 => "Сообщение",
                1 => "TEXT",
                2 => ""
            )
        ),
        "NAME" => "Перезвоните мне",
        "MAIL_TO" => "dartin1@mail.ru",
        "DESCRIPTION" => "Оставьте свои контакты, и наш менеджер свяжется с вами"
    ),
    false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
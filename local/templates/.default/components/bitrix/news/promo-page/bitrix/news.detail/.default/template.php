<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_1", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "Y",    // Выводить дату элемента
    "DISPLAY_NAME" => "Y",    // Выводить название элемента
    "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "ELEMENT_CODE" => "",    // Код новости
    "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_1"]["VALUE"],    // ID новости
    "FIELD_CODE" => array(    // Поля
        0 => "DETAIL_PICTURE",
        1 => "DETAIL_TEXT",
    ),
    "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_1"]["LINK_IBLOCK_ID"],    // Код информационного блока
    "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
    "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
    "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Страница",    // Название категорий
    "PROPERTY_CODE" => array(    // Свойства
    ),
    "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
    "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
    "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
    "USE_SHARE" => "N",    // Отображать панель соц. закладок
),
    false
); ?>
<? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_2", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "Y",    // Выводить дату элемента
    "DISPLAY_NAME" => "Y",    // Выводить название элемента
    "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "ELEMENT_CODE" => "",    // Код новости
    "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_2"]["VALUE"],    // ID новости
    "FIELD_CODE" => array(    // Поля
        0 => "DETAIL_TEXT",
        1 => "DETAIL_PICTURE",
    ),
    "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_2"]["LINK_IBLOCK_ID"],    // Код информационного блока
    "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
    "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
    "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Страница",    // Название категорий
    "PROPERTY_CODE" => array(    // Свойства
    ),
    "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
    "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
    "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
    "USE_SHARE" => "N",    // Отображать панель соц. закладок
),
    false
); ?>
<? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_3", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "Y",    // Выводить дату элемента
    "DISPLAY_NAME" => "Y",    // Выводить название элемента
    "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "ELEMENT_CODE" => "",    // Код новости
    "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_3"]["VALUE"],    // ID новости
    "FIELD_CODE" => array(    // Поля
        0 => "DETAIL_TEXT",
        1 => "",
    ),
    "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_3"]["LINK_IBLOCK_ID"],    // Код информационного блока
    "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
    "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
    "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Страница",    // Название категорий
    "PROPERTY_CODE" => array(    // Свойства
        0 => "ADVANTAGES",
    ),
    "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
    "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
    "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
    "USE_SHARE" => "N",    // Отображать панель соц. закладок
),
    false
); ?>
<? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_4", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "N",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "Y",    // Выводить дату элемента
    "DISPLAY_NAME" => "Y",    // Выводить название элемента
    "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "ELEMENT_CODE" => "",    // Код новости
    "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_4"]["VALUE"],    // ID новости
    "FIELD_CODE" => array(    // Поля
        0 => "DETAIL_TEXT",
        1 => "",
    ),
    "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_4"]["LINK_IBLOCK_ID"],    // Код информационного блока
    "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
    "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
    "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Страница",    // Название категорий
    "PROPERTY_CODE" => array(    // Свойства
    ),
    "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
    "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
    "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
    "USE_SHARE" => "N",    // Отображать панель соц. закладок
),
    false
); ?>
<div>
    <section id="themo_showcase_4" class=" showcase ">
        <div class="container">
            <? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_5", Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
                "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
                "AJAX_MODE" => "N",    // Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
                "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                "DISPLAY_DATE" => "Y",    // Выводить дату элемента
                "DISPLAY_NAME" => "Y",    // Выводить название элемента
                "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
                "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                "ELEMENT_CODE" => "",    // Код новости
                "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_5"]["VALUE"],    // ID новости
                "FIELD_CODE" => array(    // Поля
                    0 => "DETAIL_PICTURE",
                    1 => "DETAIL_TEXT",
                ),
                "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_5"]["LINK_IBLOCK_ID"],    // Код информационного блока
                "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
                "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
                "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
                "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
                "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                "PAGER_TITLE" => "Страница",    // Название категорий
                "PROPERTY_CODE" => array(    // Свойства
                ),
                "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
                "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
                "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
                "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
                "SET_STATUS_404" => "N",    // Устанавливать статус 404
                "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
                "SHOW_404" => "N",    // Показ специальной страницы
                "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
                "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
                "USE_SHARE" => "N",    // Отображать панель соц. закладок
            ),
                false
            );
            ?>

            <? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_6", Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
                "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
                "AJAX_MODE" => "N",    // Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
                "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                "DISPLAY_DATE" => "Y",    // Выводить дату элемента
                "DISPLAY_NAME" => "Y",    // Выводить название элемента
                "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
                "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                "ELEMENT_CODE" => "",    // Код новости
                "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_6"]["VALUE"],    // ID новости
                "FIELD_CODE" => array(    // Поля
                ),
                "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_6"]["LINK_IBLOCK_ID"],    // Код информационного блока
                "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
                "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
                "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
                "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
                "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
                "PAGER_TITLE" => "Страница",    // Название категорий
                "PROPERTY_CODE" => array(0 => "ADVANTAGES"),
                "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
                "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
                "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
                "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
                "SET_STATUS_404" => "N",    // Устанавливать статус 404
                "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
                "SHOW_404" => "N",    // Показ специальной страницы
                "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
                "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
                "USE_SHARE" => "N",    // Отображать панель соц. закладок
            ),
                false
            );
            ?>
        </div>
    </section>
</div>

<? $APPLICATION->IncludeComponent("bitrix:news.detail", "block_7", Array(
    "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
    "ADD_ELEMENT_CHAIN" => "N",    // Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "Y",    // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",    // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
    "BROWSER_TITLE" => "-",    // Установить заголовок окна браузера из свойства
    "CACHE_GROUPS" => "Y",    // Учитывать права доступа
    "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
    "CACHE_TYPE" => "A",    // Тип кеширования
    "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
    "DISPLAY_DATE" => "Y",    // Выводить дату элемента
    "DISPLAY_NAME" => "Y",    // Выводить название элемента
    "DISPLAY_PICTURE" => "Y",    // Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
    "ELEMENT_CODE" => "",    // Код новости
    "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_7"]["VALUE"],    // ID новости
    "FIELD_CODE" => array(    // Поля
    ),
    "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_7"]["LINK_IBLOCK_ID"],    // Код информационного блока
    "IBLOCK_TYPE" => "promo",    // Тип информационного блока (используется только для проверки)
    "IBLOCK_URL" => "",    // URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",    // Включать инфоблок в цепочку навигации
    "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",    // Установить описание страницы из свойства
    "META_KEYWORDS" => "-",    // Установить ключевые слова страницы из свойства
    "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
    "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
    "PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
    "PAGER_TITLE" => "Страница",    // Название категорий
    "PROPERTY_CODE" => array(),
    "SET_BROWSER_TITLE" => "Y",    // Устанавливать заголовок окна браузера
    "SET_CANONICAL_URL" => "N",    // Устанавливать канонический URL
    "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "Y",    // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "Y",    // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",    // Устанавливать статус 404
    "SET_TITLE" => "Y",    // Устанавливать заголовок страницы
    "SHOW_404" => "N",    // Показ специальной страницы
    "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа элемента
    "USE_PERMISSIONS" => "N",    // Использовать дополнительное ограничение доступа
    "USE_SHARE" => "N",    // Отображать панель соц. закладок
),
    false
);
?>
<section id="themo_showcase_3" class=" showcase ">
    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog",
        "catalog_promo",
        array(
            "ACTION_VARIABLE" => "action",
            "ADD_ELEMENT_CHAIN" => "Y",
            "ADD_PICT_PROP" => "MORE_PHOTO",
            "ADD_PROPERTIES_TO_BASKET" => "Y",
            "ADD_SECTIONS_CHAIN" => "Y",
            "ADD_SECTION_CHAIN" => "Y",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "ALSO_BUY_ELEMENT_COUNT" => "3",
            "ALSO_BUY_MIN_BUYES" => "1",
            "BASKET_URL" => "/cart/",
            "BIG_DATA_RCM_TYPE" => "personal",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMMON_ADD_TO_BASKET_ACTION" => "ADD",
            "COMMON_SHOW_CLOSE_POPUP" => "Y",
            "COMPATIBLE_MODE" => "N",
            "CONVERT_CURRENCY" => "N",
            "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
            "DETAIL_ADD_TO_BASKET_ACTION" => array(
                0 => "ADD",
            ),
            "DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
                0 => "ADD",
            ),
            "DETAIL_BACKGROUND_IMAGE" => "-",
            "DETAIL_BLOG_EMAIL_NOTIFY" => "N",
            "DETAIL_BLOG_URL" => "catalog_comments",
            "DETAIL_BLOG_USE" => "Y",
            "DETAIL_BRAND_PROP_CODE" => array(
                0 => "",
                1 => "BRAND_REF",
                2 => "",
            ),
            "DETAIL_BRAND_USE" => "Y",
            "DETAIL_BROWSER_TITLE" => "NAME",
            "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
            "DETAIL_DETAIL_PICTURE_MODE" => array(
                0 => "POPUP",
            ),
            "DETAIL_DISPLAY_NAME" => "Y",
            "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
            "DETAIL_FB_APP_ID" => "",
            "DETAIL_FB_USE" => "Y",
            "DETAIL_IMAGE_RESOLUTION" => "16by9",
            "DETAIL_META_DESCRIPTION" => "-",
            "DETAIL_META_KEYWORDS" => "-",
            "DETAIL_OFFERS_FIELD_CODE" => array(
                0 => "NAME",
                1 => "",
            ),
            "DETAIL_OFFERS_PROPERTY_CODE" => array(
                0 => "ARTNUMBER",
                1 => "COLOR_REF",
                2 => "MORE_PHOTO",
                3 => "SIZES_SHOES",
                4 => "SIZES_CLOTHES",
                5 => "",
            ),
            "DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
            "DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
            "DETAIL_PROPERTY_CODE" => array(
                0 => "",
                1 => "NEWPRODUCT",
                2 => "MANUFACTURER",
                3 => "MATERIAL",
                4 => "",
            ),
            "DETAIL_SET_CANONICAL_URL" => "N",
            "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
            "DETAIL_SHOW_POPULAR" => "Y",
            "DETAIL_SHOW_SLIDER" => "N",
            "DETAIL_SHOW_VIEWED" => "Y",
            "DETAIL_STRICT_SECTION_CHECK" => "N",
            "DETAIL_USE_COMMENTS" => "Y",
            "DETAIL_USE_VOTE_RATING" => "Y",
            "DETAIL_VK_USE" => "N",
            "DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
            "DISCOUNT_PERCENT_POSITION" => "bottom-right",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_SORT_FIELD" => "id",
            "ELEMENT_SORT_ORDER" => "asc",
            "ELEMENT_ID" => $arResult["PROPERTIES"]["BLOCK_8"]["VALUE"],
            "FIELDS" => array(
                0 => "SCHEDULE",
                1 => "STORE",
                2 => "",
            ),
            "FILTER_HIDE_ON_MOBILE" => "N",
            "FILTER_NAME" => "",
            "FILTER_VIEW_MODE" => "VERTICAL",
            "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
            "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
            "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
            "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
            "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
            "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
            "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
            "GIFTS_MESS_BTN_BUY" => "Выбрать",
            "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
            "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
            "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
            "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
            "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
            "GIFTS_SHOW_IMAGE" => "Y",
            "GIFTS_SHOW_NAME" => "Y",
            "GIFTS_SHOW_OLD_PRICE" => "Y",
            "HIDE_NOT_AVAILABLE" => "N",
            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
            "IBLOCK_ID" => $arResult["PROPERTIES"]["BLOCK_8"]["LINK_IBLOCK_ID"],
            "IBLOCK_TYPE" => "promo",
            "INCLUDE_SUBSECTIONS" => "Y",
            "INSTANT_RELOAD" => "N",
            "LABEL_PROP" => array(
                0 => "SALE",
            ),
            "LABEL_PROP_MOBILE" => array(
                0 => "SALE",
            ),
            "LABEL_PROP_POSITION" => "top-right",
            "LAZY_LOAD" => "N",
            "LINE_ELEMENT_COUNT" => "3",
            "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
            "LINK_IBLOCK_ID" => "",
            "LINK_IBLOCK_TYPE" => "",
            "LINK_PROPERTY_SID" => "",
            "LIST_BROWSER_TITLE" => "-",
            "LIST_ENLARGE_PRODUCT" => "STRICT",
            "LIST_META_DESCRIPTION" => "-",
            "LIST_META_KEYWORDS" => "-",
            "LIST_OFFERS_FIELD_CODE" => array(
                0 => "NAME",
                1 => "PREVIEW_PICTURE",
                2 => "DETAIL_PICTURE",
                3 => "",
            ),
            "LIST_OFFERS_LIMIT" => "0",
            "LIST_OFFERS_PROPERTY_CODE" => array(
                0 => "MORE_PHOTO",
                1 => "",
            ),
            "LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
            "LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
            "LIST_PROPERTY_CODE" => array(
                0 => "",
                1 => "rating",
                2 => "",
            ),
            "LIST_SHOW_SLIDER" => "Y",
            "LIST_SLIDER_INTERVAL" => "3000",
            "LIST_SLIDER_PROGRESS" => "N",
            "LOAD_ON_SCROLL" => "N",
            "MAIN_TITLE" => "Наличие на складах",
            "MESSAGE_404" => "",
            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
            "MESS_BTN_BUY" => "Купить",
            "MESS_BTN_COMPARE" => "Сравнение",
            "MESS_BTN_DETAIL" => "Подробнее",
            "MESS_BTN_SUBSCRIBE" => "Подписаться",
            "MESS_COMMENTS_TAB" => "Отзывы",
            "MESS_DESCRIPTION_TAB" => "Описание",
            "MESS_NOT_AVAILABLE" => "В корзину",
            "MESS_PRICE_RANGES_TITLE" => "Цены",
            "MESS_PROPERTIES_TAB" => "Дополнительная информация",
            "MIN_AMOUNT" => "10",
            "OFFERS_CART_PROPERTIES" => array(
                0 => "COLOR_REF",
            ),
            "OFFERS_SORT_FIELD" => "sort",
            "OFFERS_SORT_FIELD2" => "id",
            "OFFERS_SORT_ORDER" => "desc",
            "OFFERS_SORT_ORDER2" => "desc",
            "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
            "OFFER_TREE_PROPS" => "",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "catalog",
            "PAGER_TITLE" => "Отображено",
            "PAGE_ELEMENT_COUNT" => "9",
            "PARTIAL_PRODUCT_PROPERTIES" => "Y",
            "PRICE_CODE" => array(
                0 => "BASE",
            ),
            "PRICE_VAT_INCLUDE" => "Y",
            "PRICE_VAT_SHOW_VALUE" => "N",
            "PRODUCT_DISPLAY_MODE" => "Y",
            "PRODUCT_ID_VARIABLE" => "id",
            "PRODUCT_PROPERTIES" => array(),
            "PRODUCT_PROPS_VARIABLE" => "prop",
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
            "PRODUCT_SUBSCRIPTION" => "Y",
            "QUANTITY_FLOAT" => "N",
            "SEARCH_CHECK_DATES" => "Y",
            "SEARCH_NO_WORD_LOGIC" => "Y",
            "SEARCH_PAGE_RESULT_COUNT" => "50",
            "SEARCH_RESTART" => "N",
            "SEARCH_USE_LANGUAGE_GUESS" => "Y",
            "SECTIONS_HIDE_SECTION_NAME" => "N",
            "SECTIONS_SHOW_PARENT_NAME" => "N",
            "SECTIONS_VIEW_MODE" => "TILE",
            "SECTION_ADD_TO_BASKET_ACTION" => "ADD",
            "SECTION_BACKGROUND_IMAGE" => "-",
            "SECTION_COUNT_ELEMENTS" => "N",
            "SECTION_ID_VARIABLE" => "SECTION_ID",
            "SECTION_TOP_DEPTH" => "1",
            "SEF_FOLDER" => "/",
            "SEF_MODE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_STATUS_404" => "Y",
            "SET_TITLE" => "Y",
            "SHOW_404" => "N",
            "SHOW_DEACTIVATED" => "N",
            "SHOW_DISCOUNT_PERCENT" => "Y",
            "SHOW_EMPTY_STORE" => "Y",
            "SHOW_GENERAL_STORE_INFORMATION" => "N",
            "SHOW_MAX_QUANTITY" => "N",
            "SHOW_OLD_PRICE" => "Y",
            "SHOW_PRICE_COUNT" => "1",
            "SHOW_TOP_ELEMENTS" => "N",
            "SIDEBAR_DETAIL_SHOW" => "N",
            "SIDEBAR_PATH" => "",
            "SIDEBAR_SECTION_SHOW" => "N",
            "STORES" => array(
                0 => "",
                1 => "",
            ),
            "STORE_PATH" => "/store/#store_id#",
            "TEMPLATE_THEME" => "site",
            "TOP_ADD_TO_BASKET_ACTION" => "ADD",
            "USER_CONSENT" => "N",
            "USER_CONSENT_ID" => "0",
            "USER_CONSENT_IS_CHECKED" => "Y",
            "USER_CONSENT_IS_LOADED" => "N",
            "USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "USE_ALSO_BUY" => "Y",
            "USE_BIG_DATA" => "Y",
            "USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
            "USE_COMPARE" => "N",
            "USE_ELEMENT_COUNTER" => "Y",
            "USE_ENHANCED_ECOMMERCE" => "N",
            "USE_FILTER" => "Y",
            "USE_GIFTS_DETAIL" => "Y",
            "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
            "USE_GIFTS_SECTION" => "Y",
            "USE_MAIN_ELEMENT_SECTION" => "N",
            "USE_MIN_AMOUNT" => "N",
            "USE_PRICE_COUNT" => "N",
            "USE_PRODUCT_QUANTITY" => "Y",
            "USE_SALE_BESTSELLERS" => "Y",
            "USE_STORE" => "Y",
            "COMPONENT_TEMPLATE" => "catalog_promo",
            "ELEMENT_SORT_FIELD2" => "id",
            "ELEMENT_SORT_ORDER2" => "desc",
            "LIST_PROPERTY_CODE_MOBILE" => "",
            "DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
            "DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
            "VARIABLE_ALIASES" => array(
                "ELEMENT_ID" => "ELEMENT_ID",
                "SECTION_ID" => "SECTION_ID",
            )
        ),
        false
    ); ?>
</section>
				
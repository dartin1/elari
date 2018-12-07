<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

?>
<!DOCTYPE html>
<html class="no-js" lang="ru-RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=SITE_DIR ?>favicon.png" sizes="32x32">
    <title><?= $APPLICATION->ShowTitle(); ?></title>

    <?
    $APPLICATION->ShowHead();
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/formidablepro.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/masterslider.main.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/custom.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/vendor.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/app.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/responsive.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style(1).css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style(2).css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/header-styles.css');

    CJSCore::Init(array("jquery2"));
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-migrate.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/popup.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/masterslider.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/general.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.mask.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/vendor.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/new.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/plugins.js');;
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main1.js');
    ?>
</head>
<body class="home page page-id-1822 page-template-default  _masterslider _msp_version_2.26.0 loaded">
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<header class="banner navbar navbar-default navbar-static-top dark-header"
        role="banner">
    <!-- top navigation -->
    <div class="top-nav">
        <div class="container">
            <div class="row col-md-12">
                <div class="top-nav-text">
                </div>
                <div class="top-nav-icon-blocks">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/header/phones.php"
                        )
                    ); ?>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/header/socials.php"
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END top navigation -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="logo">
                <a href="<?=htmlspecialcharsbx(SITE_DIR)?>">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR."include/header/logo.php"
                        )
                    ); ?>
                </a>
            </div>
        </div>
        <div class="themo_cart_icon">
            <a href="http://elari.ua/cart/">
                <i class="th-icon th-i-cart"></i>
            </a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top-menu",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "Y"
                )
            );?>
        </nav>
    </div>
</header>

<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul id="menu-primary-navigation" class="nav navbar-nav">
        <?
        foreach ($arResult as $key => $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <?
            if ($key == 1) {
                foreach ($arResult["PROMO_PAGE"] as $promoPage) { ?>
                    <li><a href="<?= $promoPage["DETAIL_PAGE_URL"] ?>"><?= $promoPage["NAME"] ?></a></li>
                <? }
            }?>
            <? if ($arItem["SELECTED"]): ?>
            <li><a href="<?= $arItem["LINK"] ?>" class="selected"><?= $arItem["TEXT"] ?></a></li>
        <? else: ?>
            <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? endif ?>

        <? endforeach ?>
    </ul>
<? endif ?>
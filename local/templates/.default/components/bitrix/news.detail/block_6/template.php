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
<div class="service-blocks">
    <? $k = 1 ?>
    <? foreach ($arResult["ADVANTAGE"] as $key => $advantage) { ?>
        <? if ($k == 1) echo '<div class="row">' ?>
        <div class="service-block col-sm-6 service-block-1">
            <h3><?= $advantage["NAME"] ?></h3>
            <p><?= $advantage["FULL_DESCRIPTION"] ?></p>
        </div>
        <?
        $k++;
        if ($k == 3) {
            echo '</div>';
            $k = 1;
        }
    }
    ?>
</div>
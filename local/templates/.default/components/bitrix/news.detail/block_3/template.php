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
<div>
    <section id="themo_showcase_2" class=" showcase ">
        <div class="container">
            <div class="row">
                <div class="section-header col-xs-12 centered">
                    <h2><?= $arResult["NAME"] ?></h2>
                    <p><?= $arResult["DETAIL_TEXT"] ?></p>
                </div>
            </div>
            <div class="service-blocks">
                <? $k = 1 ?>
                <? foreach ($arResult["ADVANTAGE"] as $key => $advantage) { ?>
                    <? if ($k == 1) echo '<div class="row">' ?>
                    <div class="service-block col-sm-6 service-block-<?= $key + 1 ?>">
                        <div class="med-icon"><?= $advantage["DESCRIPTION"] ?></div>
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
        </div>
    </section>
</div>
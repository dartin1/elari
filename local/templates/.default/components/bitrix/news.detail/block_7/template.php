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
    <section id="themo_html_2" class=" content-editor ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="padding-bottom: 30px;text-align: center"><?= $arResult["NAME"] ?></h2>
                    <p style="text-align: center">
                        <iframe src="<?= $arResult["~DETAIL_TEXT"] ?>" width="560" height="315" frameborder="0"
                                allowfullscreen="allowfullscreen"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
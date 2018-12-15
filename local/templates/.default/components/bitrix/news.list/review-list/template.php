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
<div id="comments">
    <h2 class="woocommerce-Reviews-title">
        <?= DeclOfNum(count($arResult["ITEMS"]), array("отзыв", "отзыва", "отзывов")) ?> на
        <span><?= $arParams["PRODUCT_NAME"] ?></span>
    </h2>
    
    <ol class="commentlist">
        <? $key = 0 ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <li itemprop="review" itemscope="" itemtype="http://schema.org/Review"
                class="comment even thread-even depth-1">

                <div class="comment_container">

                    <img src="http://1.gravatar.com/avatar/7843a27ba054d100f7f9358af2e9dbb1?s=60&amp;d=mm&amp;r=g"
                         width="60" height="60" alt=""
                         class="avatar avatar-60wp-user-avatar wp-user-avatar-60 alignnone photo avatar-default">
                    <div class="comment-text">


                        <div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating"
                             style="float: right"
                             class="star-rating" title="Рейтинг <?= $arItem["PROPERTIES"]["RATING"]["VALUE"] ?> из 5">
                            <? $ratingWidth = $arItem["PROPERTIES"]["RATING"]["VALUE"] / 5 * 100 ?>
                            <span style="width:<?= $ratingWidth ?>%"><strong
                                    itemprop="ratingValue"><?= $arItem["PROPERTIES"]["RATING"]["VALUE"] ?></strong> из 5</span>
                        </div>


                        <p class="meta">
                            <strong itemprop="author"><?= $arItem["NAME"] ?></strong> –
                            <time itemprop="datePublished"
                                  datetime="<?= $arParams["DATE_CREATE"] ?>"><?= CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"],
                                    MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat())); ?></time>
                            :
                        </p>

                        <div itemprop="description" class="description">
                            <p><?= $arItem["PROPERTIES"]["REVIEW"]["VALUE"] ?></p>
                        </div>
                    </div>
                </div>
                <? if ($arItem["PROPERTIES"]["ADMIN_COMMENT"]["VALUE"]): ?>
                    <ul class="children">
                        <li itemprop="review" itemscope="" itemtype="http://schema.org/Review"
                            class="comment byuser comment-author-elariadmin bypostauthor even depth-2">

                            <div class="comment_container">

                                <img src="http://elari.ua/wp-content/uploads/2016/08/2016-08-17_18-05-21-60x60.png"
                                     width="60" height="60" alt="elariadmin"
                                     class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo">
                                <div class="comment-text">


                                    <p class="meta">
                                        <strong itemprop="author"><?= $arItem["USER_NAME"] ?></strong> <em
                                            class="verified">(проверенный
                                            владелец)</em> –
                                        <time itemprop="datePublished"
                                              datetime="<?= $arItem["TIMESTAMP_X"] ?>"><?= CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"],
                                                MakeTimeStamp($arItem["TIMESTAMP_X"], CSite::GetDateFormat())); ?>
                                        </time>
                                        :
                                    </p>

                                    <div itemprop="description" class="description">
                                        <?= $arItem["PROPERTIES"]["ADMIN_COMMENT"]["VALUE"] ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                <? endif; ?>
            </li>
            <? $key++ ?>
        <? endforeach; ?>
    </ol>
</div>



<div id="review_form_wrapper">
    <div id="review_form">
        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title"><?= $arParams["NAME"] ?></h3>
            <form class="comment-form" id="commentform">
                <p class="comment-notes"><span id="email-notes"><?= $arParams["DESCRIPTION"] ?></p>
                <p class="comment-form-rating">
                    <label for="rating"><?= $arResult["FIELD"][0]["VALUE"] ?></label>
                <p class="stars">
                    <span>
                        <a class="star star-1" href="javascript:void(0)">1</a>
                        <a class="star star-2" href="javascript:void(0)">2</a>
                        <a class="star star-3" href="javascript:void(0)">3</a>
                        <a class="star star-4" href="javascript:void(0)">4</a>
                        <a class="star star-5" href="javascript:void(0)">5</a>
                    </span>
                    <input hidden name="<?= $arResult["FIELD"][0]["NAME"] ?>" value="" <?= $arResult["FIELD"][0]["REQUIRED"] ?>>
                </p>
                </p>
                <p class="comment-form-comment">
                    <label for="comment"><?= $arResult["FIELD"][1]["VALUE"] ?></label>
                    <textarea name="<?= $arResult["FIELD"][1]["NAME"] ?>" cols="45" rows="8"
                        <?= $arResult["FIELD"][1]["REQUIRED"] ?>></textarea>
                </p>
                <p class="comment-form-author"><label for="author"><?= $arResult["FIELD"][2]["VALUE"] ?></label>
                    <input name="<?= $arResult["FIELD"][2]["NAME"] ?>" type="text"
                           size="30" <?= $arResult["FIELD"][2]["REQUIRED"] ?>>
                </p>
                <p class="comment-form-email">
                    <label for="email"><?= $arResult["FIELD"][3]["VALUE"] ?></label>
                    <input id="email" name="<?= $arResult["FIELD"][3]["NAME"] ?>" type="email"
                           size="30" <?= $arResult["FIELD"][3]["REQUIRED"] ?>>
                </p>
                <input type="hidden" name="<?= $arResult["FIELD"][4]["NAME"] ?>"
                       value="<?= $arResult["FIELD"][4]["VALUE"] ?>" <?= $arResult["FIELD"][4]["REQUIRED"] ?>>
                <input type="hidden" name="IBLOCK_ID" value="<?= $arParams["IBLOCK_ID"] ?>">
                <p class="form-submit">
                    <input type="submit" class="submit sendBtnJS" value="Отправить">
                </p>
            </form>
        </div>
    </div>
</div>
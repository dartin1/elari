function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function verificationFields(thisForm) {
    var isValid = false;
    thisForm.find('input, textarea').each(function (i) {
        var
            $this = $(this);
        thisVal = $this.val();
        if ($this.prop('required')) {
            if ($this.is('input[type="email"]')) {
                if (validateEmail(thisVal)) {
                    $this.removeClass('has-error');
                    return isValid = true;
                } else {
                    $this.addClass('has-error');
                    return isValid = false;
                }
            }
            if ($this.is('input[type="checkbox"]')) {
                if ($this.prop("checked") != false) {
                    $this.siblings('span').removeClass('has-error-check');
                    return isValid = true;
                } else {
                    $this.siblings('span').addClass('has-error-check');
                    return isValid = false;
                }
            }
            if (!thisVal) {
                $this.addClass('has-error');
                return isValid = false;
            } else {
                $this.removeClass('has-error');
                return isValid = true;
            }
        }
    });
    return isValid;
}

$(document).ready(function () {
    $('.sendBtnJS').on('click', function (e) {

        e.preventDefault();

        var
            $this = $(this),
            $thisForm = $this.closest('form');

        if (verificationFields($thisForm)) {

            var dataObj = new FormData($thisForm[0]);

            $.ajax({
                type: "POST",
                url: "/local/components/dartin/feedbackForm/ajax.php",
                data: dataObj,
                contentType: false,
                processData: false,
                success: function (data) {
                    if ('ERROR' in data) {
                        alert(data.ERROR);
                    } else {
                        $thisForm[0].reset();
                        $this.val("Отправлено");
                        $this.attr("disabled", true);
                    }
                }
            });
        }
        return false;
    });

    $('.star').on('click', function (e) {
        $('.star').each(function () {
            $(this).removeClass("active");
        });
        $(".stars").addClass("selected");
        $(this).addClass("active");
        if (parseInt($(this).text()) > 0 && parseInt($(this).text()) < 6)
            $(".stars input").val(parseInt($(this).text()));
    });
});


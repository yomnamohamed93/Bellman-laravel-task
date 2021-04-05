$(document).ready(function () {
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
    KTApp.init(KTAppOptions);
    if ($(".validate-form").length > 0) $(".validate-form").validationEngine({
        // validateNonVisibleFields: true,
        // updatePromptsPosition:true,
    });
    $(document).ready(function(){
        $('.password-input').on("cut copy paste",function(e) {
            e.preventDefault();
        });
    });
    // save and add new
    $("#submit_and_add_new").on('click', function () {
        let target_form = $(this).closest("form");
        target_form.find("#add_another_item").val(1);
        if ($(target_form).validationEngine('validate')) $(target_form).unbind('submit').submit();

    });
    //zoom image modal
    $(".zoom-image").click(function () {
        $("#modal-img").attr('src', ($(this).attr('src')));
        $("#imgModal").modal("show");
    });

    //page menu item
    $("#menu_item_page").change(function () {
        if ($(this).prop('checked')) $("#parent_pages_wrapper").show();
        else $("#parent_pages_wrapper").hide();
    });

    //bootstrap multiselect
    if ($("select.selectpicker").is(":visible")) $('select.selectpicker').selectpicker();

    $("input.email-validate").on("blur", function () {
        if ($(this).val() != "") {
            $(this).addClass("validate[custom[email]]");
        } else {
            if ($(this).hasClass("validate[custom[email]]")) $(this).removeClass("validate[custom[email]]");
        }
    });
    $("input.password-validate").on("blur", function () {
        if ($(this).val() != "") {
            $(this).addClass("validate[minSize[6]]");
        } else {
            if ($(this).hasClass("validate[minSize[6]]")) $(this).removeClass("validate[minSize[6]]")
        }
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            let _parent = $(input).closest('.form-group');
            let _target_img = $(_parent).find('.uploaded-img');
            reader.onload = function (e) {
                $(_target_img).attr('src', e.target.result);
                if (_parent.find('.img-hint-result').length > 0) {
                    _parent.find('.img-hint-result').hide();
                }
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change", "input.custom-file-input", function () {
        readURL(this);
    });

    //-----------validate items uniqueness-----------//
    //validate user uniqueness
    $("#add-user-form, #edit-user-form").submit(function (e) {
        $("#email-hint-result").hide();
        $("#phone-hint-result").hide();
        e.preventDefault();
        let target_form = $(this);
        //  check country name unique
        let email = $("#user-email").val();
        let phone = $("#user-phone").val();
        let id = $("#user-email").attr('data-item-id');
        $.ajax({
            type: "GET",
            url: BASE_URL + '/check_user_unique/',
            data: {
                'phone': phone,
                'email': email,
                "_token": $('#token').val(),
                "item_id": id
            },
            success: function(data) {
                if (data == 'valid') {
                    if ($(target_form).validationEngine('validate')) $(target_form).unbind('submit').submit();
                } else {
                    switch (data) {
                        case 'email_phone':
                            $("#email-hint-result").show();
                            $("#phone-hint-result").show();
                            break;
                        case 'email':
                            $("#email-hint-result").show();
                            break;
                        case 'phone':
                            $("#phone-hint-result").show();
                            break;
                    }
                }
            }
        });

    });

    //delete items
    $(document).on("click", 'button.delete_btn', function () {
        // console.log("ss");
        let target_form = $(this).closest(".delete_form");
        // target_form.preventDefault();
        let cancel_txt = backend_lang == "ar" ? "الغاء" : "Cancel";
        let ok_txt = backend_lang == "ar" ? "حسنا" : "Ok";
        Swal.fire({
            title: $("#delete_msg").val(),
            text: $("#sub_delete_msg").val(),
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: ok_txt,
            cancelButtonText: cancel_txt,
        }).then((result) => {
            if (result.value) {
                $(target_form).submit();
            }
        });

    });

    $(document).on('click', '.remove-image', function () {
        let url = $(this).data('url');
        let method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function (res) {
                $('.image-container').css('display', 'none');
                $('#user-avatar').val('');
                $('#deleteImageModal').modal('hide');
            }
        });
    });
});

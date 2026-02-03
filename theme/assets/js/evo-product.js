jQuery(function ($) {
$('.evo-owl-product').slick({
    dots: false,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: false,
    infinite: false,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 4
            }
        }
    ]
});
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    lazyLoad: 'ondemand',
    fade: true,
    infinite: false,
    asNavFor: '.slider-nav',
    adaptiveHeight: false,
    responsive: [
        {
            breakpoint: 480,
            settings: {
                dots: true
            }
        }
    ]
});
$('.slider-big-video .slider-for a').each(function () {
    $(this).attr('rel', 'lightbox-demo');
});
var variantsize = false;
var alias = '';
var getLimit = 10;
var productOptionsSize = 1;
var selectCallback = function (variant, selector) {
    if (variant) {
        var form = jQuery('#' + selector.domIdPrefix).closest('form');
        for (var i = 0, length = variant.options.length; i < length; i++) {
            var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant.options[i] + '"]');
            if (radioButton.size()) {
                radioButton.get(0).checked = true;
            }
        }
    }
    var addToCart = jQuery('.form-product .btn-cart'),
        form = jQuery('.form-product .form-group'),
        productPrice = jQuery('.details-pro .special-price .product-price'),
        qty = jQuery('.inventory_quantity .a-stock'),
        comparePrice = jQuery('.details-pro .old-price .product-price-old'),
        comparePriceText = jQuery('.details-pro .old-price'),
        savePrice = jQuery('.details-pro .save-price .product-price-save'),
        savePriceText = jQuery('.details-pro .save-price'),
        qtyBtn = jQuery('.form-product .form-group .custom-btn-number'),
        BtnSold = jQuery('.form-product .form-group .btn-mua'),
        product_sku = jQuery('.details-product .sku-product .variant-sku');
    if (variant && variant.sku != "" && variant.sku != null) {
        product_sku.html(variant.sku);
    } else {
        product_sku.html('(Đang cập nhật...)');
    }
    if (variant && variant.available) {
        if (variant.inventory_management == "bizweb") {
            if (variant.inventory_quantity != 0) {
                qty.html('<span class="a-stock">Còn hàng</span>');
            } else if (variant.inventory_quantity == '') {
                if (variant.inventory_policy == "continue") {
                    qty.html('<span class="a-stock">Còn hàng</span>');
                } else {
                    qty.html('<span class="a-stock a-stock-out">Hết hàng</span>');
                }
            }
        } else {
            qty.html('<span class="a-stock">Còn hàng</span>');
        }
        addToCart.html('Thêm vào giỏ').removeAttr('disabled');
        BtnSold.removeClass('btnsold');
        qtyBtn.removeClass('d-none');
        if (variant.price == 0) {
            productPrice.html('Liên hệ');
            comparePrice.hide();
            savePrice.hide();
            comparePriceText.hide();
            savePriceText.hide();
            form.addClass('d-none');
        } else {
            form.removeClass('d-none');
            productPrice.html(Bizweb.formatMoney(variant.price, ""));
            addToCart.html('Thêm vào giỏ');
            if (variant.compare_at_price > variant.price) {
                comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "")).show();
                savePrice.html('-' + (Math.round(((variant.compare_at_price - variant.price) / variant.compare_at_price) * 100)) + "%").show();
                comparePriceText.show();
                savePriceText.show();
            } else {
                comparePrice.hide();
                savePrice.hide();
                comparePriceText.hide();
                savePriceText.hide();
            }
        }
    } else {
        qty.html('<span class="a-stock a-stock-out">Hết hàng</span>');
        addToCart.html('Hết hàng').attr('disabled', 'disabled');
        BtnSold.addClass('btnsold');
        qtyBtn.addClass('d-none');
        if (variant) {
            if (variant.price != 0) {
                form.removeClass('d-none');
                productPrice.html(Bizweb.formatMoney(variant.price, ""));
                if (variant.compare_at_price > variant.price) {
                    comparePrice.html(Bizweb.formatMoney(variant.compare_at_price, "")).show();
                    savePrice.html('-' + (Math.round(((variant.compare_at_price - variant.price) / variant.compare_at_price) * 100)) + "%").show();
                    comparePriceText.show();
                    savePriceText.show();
                } else {
                    comparePrice.hide();
                    savePrice.hide();
                    comparePriceText.hide();
                    savePriceText.hide();
                }
            } else {
                productPrice.html('Liên hệ');
                comparePrice.hide();
                savePrice.hide();
                comparePriceText.hide();
                savePriceText.hide();
                form.addClass('d-none');
            }
        } else {
            productPrice.html('Liên hệ');
            comparePrice.hide();
            savePrice.hide();
            comparePriceText.hide();
            savePriceText.hide();
            form.addClass('d-none');
        }
    }
    /*begin variant image*/
    if (variant && variant.image) {
        var originalImage = jQuery(".slider-nav img");
        var newImage = variant.image;
        var element = originalImage[0];
        Bizweb.Image.switchImage(newImage, element, function (newImageSizedSrc, newImage, element) {
            $('.slider-nav .slick-slide').each(function () {
                var $this = $(this);
                var imgThis = $this.find('img').attr('data-image');
                if (newImageSizedSrc.split("?")[0] == imgThis.split("?")[0]) {
                    var pst = $this.attr('data-slick-index');
                    jQuery(".slider-for").slick('slickGoTo', pst);
                }
            });
        });
    }
    /*end of variant image*/
};
jQuery(function ($) {



    $('.selector-wrapper').css({
        'text-align': 'left',
        'margin-bottom': '15px'
    });
});
jQuery('.swatch :radio').change(function () {
    var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
    var optionValue = jQuery(this).val();
    jQuery(this)
        .closest('form')
        .find('.single-option-selector')
        .eq(optionIndex)
        .val(optionValue)
        .trigger('change');
});
$(document).ready(function () {
    $(document).on("scroll", onScroll);
    $('a[href*=\\#]:not([href=\\#])').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 500, function () {
            $(document).on("scroll", onScroll);
        });
    });
});
function onScroll(event) {
    var scrollPos = $(document).scrollTop();
    $('.evo-tour-program a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('.evo-tour-program ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else {
            currLink.removeClass("active");
        }
    });
}

$(document).ready(function () {
    $("#quantity-0").focus();
    $("#submit-table").click(function (e) {
        e.preventDefault();
        var toAdd = new Array();
        var qty;
        for (i = 0; i < length; i++) {
            var q = $("#quantity-" + i).val();
            if (q > 0) {
                toAdd.push({
                    variant_id: $("#variant-" + i).val(),
                    variant_date: $("#datesss").val(),
                    variant_dates: $("#datesss").val(),
                    quantity_id: $("#quantity-" + i).val() || 0
                });
            };
        }
        function moveAlong() {
            if (toAdd.length) {
                var request = toAdd.shift();
                var tempId = request.variant_id;
                var tempQty = request.quantity_id;
                var tempDate = request.variant_date;
                data = {
                    "quantity": tempQty,
                    "variantId": tempId,
                    "properties[Ngày đi]": tempDate
                }
                debugger;
                var params = {
                    type: 'POST',
                    url: '/cart/add.js',
                    data: data,
                    dataType: 'json',
                    success: function (line_item) {
                        moveAlong();
                        jQuery.getJSON('/cart.js', function (cart) {
                            var item_count = cart.item_count;
                        });
                    },
                    error: function () {
                        moveAlong();
                    }
                };
                $.ajax(params);
            }
            else {
                document.location.href = '/cart';
            }
        };
        moveAlong();
    });
    var dates = $("#date-khoi-hanh").text();
    var n = dates.search("Chủ nhật");
    var cn = dates.substring(n, 8);
    var numb = dates.match(/\d/g);
    if (n > -1) {
        if (numb && numb.length) {
            numb.push('1');
        } else {
            numb = ['1'];
        }
    }
    var dateToday = new Date();
    function DisableMonday(date) {
        var day = date.getDay();
        var i;
        if (numb && numb.length) {
            for (i = 0; i < numb.length; i++) {
                var m = numb[i] - 1;
                var m1 = numb[i + 1] - 1;
                var m2 = numb[i + 2] - 1;
                var m3 = numb[i + 3] - 1;
                var m4 = numb[i + 4] - 1;
                var m5 = numb[i + 5] - 1;
                var m6 = numb[i + 6] - 1;
                if (day == m || day == m1 || day == m2 || day == m3 || day == m4 || day == m5 || day == m6) {
                    return [true];
                } else {
                    return [false];
                }
            }
        } else {
            return [true];
        }
    }
    $(".tourmaster-datepicker").datepicker({
        defaultDate: "",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        minDate: dateToday,
        beforeShowDay: DisableMonday
    });
});
});
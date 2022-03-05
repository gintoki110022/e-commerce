$(document).ready(function() {
    $(document).on('click', '.addcart', function() {
        if (localStorage.getItem('status') != null) {
            // console.log(localStorage.getItem('status'));
            var pid = $(this).val();
            if ($('#cart' + pid).is(':visible')) {
                $('#cart' + pid).hide();

            } else {
                $('#cart' + pid).show();
            }
        } else {
            // console.log('abc');
            window.alert('You need to login first!');
            window.location.href = 'login.html';
        }


    });

    $(document).on('click', '.concart', function() {
        if (localStorage.getItem('status') != null) {
            var pid = $(this).val();
            var qty = $('#qty' + pid).val();
            $('#cart' + pid).hide();
            if (qty.match(/^\d+$/)) {

                $.ajax({
                    url: "add_cart.php",
                    method: "POST",
                    data: {
                        id: pid,
                        qty: qty,
                        cart: 1,
                    },
                    success: function(data) {
                        if (data != "") {
                            alert(data);
                        } else {
                            showCart();
                        }
                    }
                });

            } else if (qty == "") {
                alert('Please enter Quantity');
            } else {
                alert('Please Enter a Numeric Value');
            }
        } else {
            window.alert('You need to login first!');
            window.location.href = 'login.html';
        }
    });

    $(document).on('click', '.remove_product', function() {
        var pid = $(this).val();
        $.ajax({
            url: "del_product.php",
            method: "POST",
            data: {
                id: pid,
                rem: 1,
            },
            success: function() {
                showCart();
            }
        });
    });

    $(document).on('click', '#close_cart', function() {
        closeCart();
    });

    $(document).on('click', '#cart_control', function() {
        if ($('#cart_area').is(':visible')) {
            closeCart();
        } else {
            showCart();
        }
    });

    $(document).on('click', '#check', function() {
        var total = $('#total').text();
        window.location.href = 'confirm_check.php?total=' + total;
    });

    $(document).on('click', '.remove_prod', function() {
        var prodid = $(this).val();
        $.ajax({
            url: "del_product.php",
            method: "POST",
            data: {
                id: prodid,
                rem: 1,
            },
            success: function(data) {
                showCheckout();
            }
        });
    });

    $(document).on('click', '.minus_qty', function() {
        var prodid = $(this).val();
        $.ajax({
            url: "minus_cart.php",
            method: "POST",
            data: {
                id: prodid,
                min: 1,
            },
            success: function() {
                showCart();
            }
        });
    });

    $(document).on('click', '.minus_qty2', function() {
        var prodid = $(this).val();
        $.ajax({
            url: "minus_cart.php",
            method: "POST",
            data: {
                id: prodid,
                min: 1,
            },
            success: function() {
                showCheckout();
            }
        });
    });

    $(document).on('click', '.add_qty', function() {
        var prodid = $(this).val();
        $.ajax({
            url: "plus_cart.php",
            method: "POST",
            data: {
                id: prodid,
                add: 1,
            },
            success: function() {
                showCart();
            }
        });
    });

    $(document).on('click', '.add_qty2', function() {
        var prodid = $(this).val();
        $.ajax({
            url: "plus_cart.php",
            method: "POST",
            data: {
                id: prodid,
                add: 1,
            },
            success: function() {
                showCheckout();
            }
        });
    });

    $("#search").keyup(function() {
        var name = $('#search').val();
        if (name == "") {
            $("#search_area").hide();
        } else {
            $.ajax({
                type: "POST",
                url: "search_num.php",
                data: {
                    name: name,
                    num: 1
                },
                success: function(num) {
                    showSearch(num, name);
                }
            });
        }
    });

    // filter_data();
    // $('.product-item').show();

    function filter_data(page) {
        $('.filter_data').html('<div id="loading"></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand_name');
        var ram = get_filter('ram');
        var status = get_filter('status');
        var color = get_filter('color');
        //get param category for filter each ASUS, LENOVO, DELL
        const urlString = window.location.search;
        const paramSearch = new URLSearchParams(urlString);
        const cat = paramSearch.get('cat');

        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                brand: brand,
                ram: ram,
                status: status,
                color: color,
                cat: cat,
                page: page
            },
            success: function(data) {
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    var product_item = document.querySelector('.product-item');

    $('.common_selector').click(function() {
        if ($('.common_selector').is(':checked')) {
            filter_data();
            $(document).on('click', '.pagination_page_num', function() {
                var page = $(this).attr("id");
                filter_data(page);
            });
        } else {
            $('.filter_data').html(product_item);
        }
    });

    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + ',')) + prev
        })
    }

    $('#price_range').slider({
        range: true,
        min: 5000000,
        max: 100000000,
        values: [5000000, 100000000],
        step: 10000,
        stop: function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
            $(document).on('click', '.pagination_page_num', function() {
                var page = $(this).attr("id");
                filter_data(page);
            });
        }
    });

    /////PAGINATION
    load_data();

    function load_data(page) {
        //get param category for filter each ASUS, LENOVO, DELL
        const urlString = window.location.search;
        const paramSearch = new URLSearchParams(urlString);
        const cat = paramSearch.get('cat');
        $.ajax({
            url: "product_item.php",
            method: "POST",
            data: {
                page: page,
                cat: cat
            },
            success: function(data) {
                $('.product-item').html(data);
            }
        })
    }

    $(document).on('click', '.pagination_link', function() {
        var page = $(this).attr("id");
        load_data(page);
    });

});


///not using document.ready
function showCart() {
    $.ajax({
        url: "fetch_cart.php",
        method: "POST",
        data: {
            fcart: 1,
        },
        success: function(response) {
            $('#cart_area').html(response);
            $('#cart_box').show();
            $('#cartme').addClass('active');
            $("#cart_area").scrollTop($("#cart_area")[0].scrollHeight);
        }
    });
}

function showSearch(num, name) {
    var height;
    if (num == 0) {
        height = 40;
    } else if (num >= 5) {
        height = 200;
    } else {
        height = 40 * num;
    }
    $.ajax({
        url: "search_processing.php",
        method: "POST",
        data: {
            name: name,
            ss: 1,
        },
        success: function(response) {
            $('#search_area').html(response).show();
            $('#search_area').height(height);
        }
    });
}

function closeCart() {
    $('#cart_box').hide();
    $('#cartme').removeClass('active');
}

function showCheckout() {
    $.ajax({
        url: "fetch_checkout.php",
        method: "POST",
        data: {
            check: 1,
        },
        success: function(response) {
            $('#checkout_area').html(response);
        }
    });
}

$("#offer_form").on("submit", function(event) {
    event.preventDefault();
    // $(".overlay").show();
    $.ajax({
        url: "offersmail.php",
        method: "POST",
        data: $("#offer_form").serialize(),
        success: function(data) {
            // $(".overlay").hide();
            $("#offer_msg").html(data);

        }
    })
})
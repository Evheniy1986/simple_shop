

$(document).ready(function() {
    // Добавление товара в корзину без перезагрузки
    $('.add-to-cart').click(function(e) {
        e.preventDefault();

        var productId = $(this).closest('.product').data('product-id');

        $.ajax({
            url: '/basket/add-to-cart',
            type: 'GET',
            data: { productId: productId },
            success: function(response) {

                    let totalQuantity = 0;
                Object.keys(response.cart).forEach(function(productId) {
                    let product = response.cart[productId];
                     totalQuantity += product.qty

                });
                let successMessage = response.success;
                swal.fire('', successMessage, 'success');
                $('#warningMessage').html('<div class="alert alert-success text-center">' + successMessage + '</div>');
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');

            },
            error: function(xhr, status, error) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.warning ? xhr.responseJSON.warning : 'An error occurred while adding the product to the cart.';
                swal.fire('', errorMessage, 'warning');
                console.error(xhr.responseText);
            }
        });
    });

    // Добавление товара в самой корзине(увеличение количества)
    $('.addQuantity').click(function (e) {
        e.preventDefault();
        let productId = $(this).closest('.addQuantity').data('product-id')

        $.ajax({
            url: '/basket/add-quantity/' + productId,
            type: 'POST',
            data: { productId: productId },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let totalSumm = response.totalSum;
                let totalQuantity = response.count;

                $('.qty[data-product-id="' + productId +'"]').text(response.cart.qty);
                $('.all-price[data-product-id="' + productId +'"]').text(response.cart.qty * response.cart.price);
                $('.total-sum').text(totalSumm);
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');
            },
            error: function(xhr, status, error) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.warning ? xhr.responseJSON.warning : 'An error occurred while adding the product to the cart.';
                swal.fire('', errorMessage, 'warning');
                console.error(xhr.responseText);
            }
        });
    });

    // Удаление товара в самой корзине(уменьшение количества)
    $('.removeQuantity').click(function (e) {
        e.preventDefault();

        let productId = $(this).closest('form').attr('action').split('/').pop()

        $.ajax({
            url: '/basket/remove-quantity/' + productId,
            type: 'POST',
            data: { productId: productId },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let quantity = response.cart[productId].qty
                let price = response.cart[productId].price
                console.log(response)
                let totalSumm = response.totalSum;
                let totalQuantity = response.count;
                console.log(response)

                    if (quantity < 1 ) {
                        $('tr[data-product-id="' + productId +'"]').remove();
                    }
                $('.qty[data-product-id="' + productId +'"]').text(quantity);
                $('.all-price[data-product-id="' + productId +'"]').text(quantity * price);
                $('.total-sum').text(totalSumm);
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');
            },
            error: function(xhr, status, error) {
                if (xhr.responseJSON.not_found_product) {
                    window.location.href = '/';
                }

            }
        });
    });

});

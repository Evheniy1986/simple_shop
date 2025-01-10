$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Добавление товара в корзину без перезагрузки
    $('.add-to-cart').click(function (e) {
        e.preventDefault();
        var productId = $(this).data('product-id');

        $.ajax({
            url: '/basket/add-to-cart',
            type: 'POST',
            data: {productId: productId},
            success: function (response) {

                let totalQuantity = 0;
                Object.keys(response.cart).forEach(function (productId) {
                    let product = response.cart[productId];
                    totalQuantity += product.qty

                });
                let successMessage = response.success
                swal.fire('', successMessage, 'success');
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');

            },
            error: function (xhr, status, error) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.warning ? xhr.responseJSON.warning : 'An error occurred while adding the product to the cart.';
                swal.fire('', errorMessage, 'warning');
                console.error(xhr.responseText);
            }
        });
    });

    // Добавление товара в самой корзине(увеличение количества)
    $('.addQuantity').click(function (e) {
        e.preventDefault();
        let productId = $(this).data('product-id')

        $.ajax({
            url: '/basket/add-quantity',
            type: 'POST',
            data: {productId: productId},
            success: function (response) {
                let totalSumm = response.totalSum;
                let totalQuantity = response.count;

                $('.qty[data-product-id="' + productId + '"]').text(response.cart.qty);
                $('.all-price[data-product-id="' + productId + '"]').text(response.cart.qty * response.cart.price + ' грн');
                $('.total-sum').text(totalSumm + ' грн');
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');
            },
            error: function (xhr, status, error) {
                let errorMessage = xhr.responseJSON && xhr.responseJSON.warning ? xhr.responseJSON.warning : 'An error occurred while adding the product to the cart.';
                swal.fire('', errorMessage, 'warning');
                console.error(xhr.responseText);
            }
        });
    });

    // Удаление товара в самой корзине(уменьшение количества)
    $('.removeQuantity').click(function (e) {
        e.preventDefault();

        let productId = $(this).data('product-id')
        $.ajax({
            url: '/basket/remove-quantity',
            type: 'POST',
            data: {productId: productId},
            success: function (response) {
                let product = response.cart[productId]
                let totalSumm = response.totalSum;
                let totalQuantity = response.count;

                if (product.qty < 1) {
                    $('tr[data-product-id="' + productId + '"]').remove();
                }
                $('.qty[data-product-id="' + productId + '"]').text(product.qty);
                $('.all-price[data-product-id="' + productId + '"]').text(product.qty * product.price + ' грн');
                $('.total-sum').text(totalSumm + ' грн');
                $('.cart-badge').html(totalQuantity + '<i class="fas fa-cart-arrow-down"></i>');
            },
            error: function (xhr, status, error) {
                if (xhr.responseJSON.not_found_product) {
                    window.location.href = '/';
                }
            }
        });
    });

    $('.city_name').on('input', function () {
        var cityName = $(this).val().trim(); // Получаем введенное значение
        if (cityName.length <= 2) {
            $('.cityList').empty().hide(); // Очищаем и скрываем список городов, если поле пустое
            return;
        }

        // Отправляем запрос на сервер для получения подходящих городов
        $.ajax({
            url: 'https://api.novaposhta.ua/v2.0/json/',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                apiKey: 'f556823e8b62fa03487894e5df52bcd0',
                modelName: 'AddressGeneral',
                calledMethod: 'searchSettlements',
                methodProperties: {
                    CityName: cityName,
                    Page: '1',
                    Limit: '10'
                }
            }),
            success: function (response) {
                var cities = response.data[0].Addresses; // Получаем список городов из ответа

                var $cityList = $('.cityList').empty(); // Очищаем список городов
                cities.forEach(function (city) {
                    $cityList.append('<li>' + city.Present + '</li>'); // Добавляем города в список

                });

                $cityList.show(); // Показываем список городов


                // Обработка выбора города из списка
                $(document).on('click', '.cityList li', function () {
                    let selectedCity;
                    var textCity = $(this).text();
                    cities.forEach(function (city) {
                        if (city.Present === textCity) {
                            selectedCity = city.MainDescription
                            return selectedCity;
                        }
                    })
                    $('.city_name').val(selectedCity);
                    $('.cityList').hide(); // Скрываем список городов после выбора

                });


            },
            error: function (xhr, status, error) {
                console.error('Ошибка при получении данных:', error);
            }
        });
    });


    $('.warehouse').click(function () { // Обработчик события клика на элементе с классом .warehouse
        var warehouse = $('.city_name').val(); // Получаем введенное значение из элемента с классом .city_name

        $.ajax({
            url: 'https://api.novaposhta.ua/v2.0/json/',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                apiKey: 'f556823e8b62fa03487894e5df52bcd0',
                modelName: 'AddressGeneral',
                calledMethod: 'getWarehouses',
                methodProperties: {
                    CityName: warehouse,
                    // TypeOfWarehouseRef: '841339c7-591a-42e2-8233-7a0a00f0ed6f',
                    // Page: '1',
                    // Limit: '200'
                }
            }),
            success: function (response) {
                let warehouses = response.data;

                var $warehousList = $('.warehouseList').empty();
                warehouses.forEach(function (warehouse) {
                    $warehousList.append('<li>' + warehouse.Description + '</li>');
                    // console.log('Номер склада:', warehouse.SiteKey);
                    // console.log('Адрес склада:', warehouse);
                })

                $warehousList.show()

                $(document).on('click', '.warehouseList li', function () {
                    var selectedwarehouse = $(this).text();
                    $('.warehouse').val(selectedwarehouse);
                    $('.warehouseList').hide(); // Скрываем список городов после выбора

                });

            },
            error: function (xhr, status, error) {
                console.error('Ошибка при получении данных:', error);
            }
        });
    });



});

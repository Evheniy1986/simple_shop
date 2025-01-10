$(document).ready(function () {

    // Получение бренда в зависимости от категории
    $('#category_id').change(function () {
        let categoryId = $(this).val()

        if (categoryId) {
            $.ajax({
                url: '/get-brands/' + categoryId,
                type: 'GET',
                success: function (data) {
                    console.log(data)
                    $('#brand_id').empty();
                    $('#brand_id').append('<option disabled selected>Выберите бренд</option>');
                    data.forEach(function (brand) {
                        $('#brand_id').append('<option value="' + brand.id + '">' + brand.name + '</option>');
                    });
                },
                error: function () {
                    console.log(error)
                    alert('Произошла ошибка при загрузке брендов.');
                }
            });
        } else {
            $('#brand_id').empty();
            $('#brand_id').append('<option disabled selected>Выберите бренд</option>');
        }
    });



});

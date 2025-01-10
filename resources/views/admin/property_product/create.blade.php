@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание характеристики для продукта</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="">
                <form action="{{ route('admin.property_products.store', $product) }}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Характеристика</th>
                            <th>Значение</th>
                            <th>
                                <button type="button" class="btn btn-success" id="addRow">Добавить</button>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="dynamicRows">
                        <tr>
                            <td>
                                <select name="property_id[]" class="form-control">
                                    <option disabled selected>Выберите арактеристику</option>
                                    @foreach($properties as $property)
                                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="value[]" class="form-control" placeholder="Введите значение">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger removeRow">Удалить</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </section>
    <script>
        document.getElementById('addRow').addEventListener('click', function () {
            const tbody = document.getElementById('dynamicRows');
            const row = `
                        <tr>
                            <td>
                                <select name="property_id[]" class="form-control">
                            @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}
                            @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="value[]" class="form-control" placeholder="Введите значение">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger removeRow">Удалить</button>
                            </td>
                        </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeRow')) {
                e.target.closest('tr').remove();
            }
        });
    </script>

@endsection


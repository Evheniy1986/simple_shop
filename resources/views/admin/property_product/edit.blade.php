@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование Характеристики товара</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="">
                <form class="" action="{{ route('admin.property_products.update', $product) }}"
                      method="post">
                    @method('put')
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
                        @foreach($product->properties as $property)
                            <tr>
                                <td>
                                    <select name="property_id[]" class="form-control">
                                        <option disabled selected>Выберите характеристику</option>
                                        @foreach($properties as $prop)
                                            <option value="{{ $prop->id }}" {{ $prop->id == $property->id ? 'selected' : '' }}>
                                                {{ $prop->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="value[]" class="form-control"
                                           value="{{ $property->pivot->value ?? '' }}" placeholder="Введите значение">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow">Удалить</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </form>

                <script>
                    // Добавление новой строки
                    document.getElementById('addRow').addEventListener('click', function () {
                        const tbody = document.getElementById('dynamicRows');
                        const row = `
                                    <tr>
                                        <td>
                                            <select name="property_id[]" class="form-control">
                                                <option disabled selected>Выберите характеристику</option>
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
                        `;
                        tbody.insertAdjacentHTML('beforeend', row);
                    });

                    // Удаление строки
                    document.addEventListener('click', function (e) {
                        if (e.target && e.target.classList.contains('removeRow')) {
                            e.target.closest('tr').remove();
                        }
                    });
                </script>

            </div>

        </div>
    </section>
@endsection


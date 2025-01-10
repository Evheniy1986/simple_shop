@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Опции</h1>
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
            <h3 class="text-center mb-4">Редактирование Опций</h3>
            <div class="">
                <form class="w-50 m-auto" action="{{ route('admin.values.update', $product) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="optionValues" class="form-label">Выберите опции</label>
                        <select name="option_values[]" id="optionValues" class="custom-select form-control" multiple style="height: auto;" size="10">
                            @foreach($options as $option)
                                <optgroup label="{{ $option->title }}">
                                    @foreach($option->values as $value)
                                        <option {{ $product->optionValues->contains($value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->value }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>


                    <div class="text-right mt-5">
                        <button class="btn btn-success" type="submit">Редактировать Бренд</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection


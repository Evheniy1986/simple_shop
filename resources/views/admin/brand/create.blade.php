@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Бренды</h1>
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
            <h3 class="text-center mb-4">Создание Бренда</h3>
            <div class="">
                <form class="w-50 m-auto" action="{{ route('admin.brands.store') }}" method="post">
                    @csrf

                    <div class="mb-3 mt-3">
                        <select class="custom-select form-control" name="category_id" id="">
                            <option disabled selected>Выберите категрию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Название</label>
                        <div class="">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>



                    <div class="text-right mt-5">
                        <button class="btn btn-success" type="submit">Создать Бренд</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection


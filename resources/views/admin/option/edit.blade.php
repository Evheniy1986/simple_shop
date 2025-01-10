@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Опции</h1>
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
            <h3 class="text-center mb-4">Редактирование опции</h3>
            <div class="">
                <form class="w-50 m-auto" action="{{ route('admin.options.update', $option) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Имя</label>
                        <div class="">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" value="{{ $option->title }}" class="form-control"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="text-right mb-5">
                        <button class="btn btn-success" type="submit">Редактировать</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection


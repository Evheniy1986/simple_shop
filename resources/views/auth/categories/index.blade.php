@extends('layouts.admin')
@section('title',  'Категории' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Категории</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Код</th>
                <th scope="col">Название</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
                                @csrf
                                <a class="btn btn-success" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning" href="{{ route('categories.edit', $category->id) }}">Редактировать</a>
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Удалить">

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn bg-success" type="button" href="{{ route('categories.create') }}">Добавить категорию</a>
        {{ $categories->links() }}
    </div>

@endsection


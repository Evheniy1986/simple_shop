@extends('layouts.admin')
@section('title',  'Свойства' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Свойства</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Название_en</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($properties as $property)
                <tr>
                    <th scope="row">{{ $property->id }}</th>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->name_en }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('properties.destroy', $property) }}" method="post">
                                @csrf
                                <a class="btn btn-success" href="{{ route('properties.show', $property) }}">Открыть</a>
                                <a class="btn btn-warning" href="{{ route('properties.edit', $property->id) }}">Редактировать</a>
                                <a class="btn btn-info" href="{{ route('property-options.index', $property->id) }}">Значения свойства</a>
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Удалить">

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn bg-success" type="button" href="{{ route('properties.create') }}">Добавить свойства</a>
        {{ $properties->links() }}
    </div>

@endsection


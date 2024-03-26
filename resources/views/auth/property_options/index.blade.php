@extends('layouts.admin')
@section('title',  'Варианты свойств' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Варианты свойств</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Свойство</th>
                <th scope="col">Название</th>
                <th scope="col">Название_en</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($propertyOptions as $propertyOption)
                <tr>
                    <th scope="row">{{ $propertyOption->id }}</th>
                    <td>{{ $property->name }}</td>
                    <td>{{ $propertyOption->name }}</td>
                    <td>{{ $propertyOption->name_en }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('property-options.destroy', [$property, $propertyOption]) }}" method="post">
                                @csrf
                                <a class="btn btn-success" href="{{ route('property-options.show', [$property, $propertyOption]) }}">Открыть</a>
                                <a class="btn btn-warning" href="{{ route('property-options.edit', [$property, $propertyOption]) }}">Редактировать</a>
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Удалить">

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn bg-success" type="button" href="{{ route('property-options.create', $property) }}">Добавить вариант свойства</a>
        {{ $propertyOptions->links() }}
    </div>

@endsection


@extends('layouts.app')

@section('content')
  <div class="container">
        <div class="row  justify-content-center">
          <div class="col-md-8 col-md-offset-4">
            <div class="card">
             @include('message.session')
                <div class="card-header">
                    Listado de etiquetas

                    <a href="{{ route('tags.create') }}"
                    class="btn btn-sm btn-primary float-right">
                        Crear
                    </a>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th class="text-center" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td width=10px>
                                        <a href="{{ route('tags.show', $tag) }}" class="btn btn-info">
                                            ver
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-outline-dark">
                                            Editar
                                        </a>
                                    </td>

                                    <td width=10px>
                                        <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                                            @method('DElETE')
                                            @csrf
                                            <input
                                            class="btn btn-danger"
                                            type="submit"
                                            value="Eliminar">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tags->render() }}
                </div>
            </div>
          </div>
      </div>
  </div>
@endsection

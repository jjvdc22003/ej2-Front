@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-secondary mb-3">
                    <div class="card-header p-3 mb-2 bg-secondary text-white">
                        Listado de personas
                        <a href="{{ route('personas.create') }}" class="btn btn-success btn-sm float-right">Agregar persona</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered table-sm">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($personas as $persona)
                                <tr>
                                    <td> {{ $persona->id }} </td>
                                    <td> {{ $persona->nombre }} </td>
                                    <td> {{ $persona->apellidos }} </td>
                                    <td>
                                        <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn btn-primary btn-sm">Actualizar</a>
                                        <a href="javascript: document.getElementById('delete-{{ $persona->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $persona->id }}" action="{{ route('personas.delete', $persona->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
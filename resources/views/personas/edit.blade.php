@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-secondary mb-3">
                    <div class="card-header p-3 mb-2 bg-secondary text-white">
                        <strong>Actualizar persona</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('personas.update', $persona->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input type="text" value="{{ $persona->nombre }}" class="form-control" name="nombre" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos:</label>
                                <input type="text" value="{{ $persona->apellidos}}" class="form-control" name="apellidos" id="">
                            </div>
                            <a href="{{ route('personas.index') }}" class="btn btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
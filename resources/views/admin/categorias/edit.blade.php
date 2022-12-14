@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Editar Categorias</h1>
@stop

{{-- Alerta Actualizacion Correcta --}}
@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>

        </div>

    @endif

<div class="card">
    <div class="card-body">
        
        {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria], 'method' => 'put'])!!}

         <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Categoria']) !!}

            @error('nombre')
                <span class="text-danger">{{$message}}</span>
            @enderror
         </div>

         <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Slug de la Categoria', 'readonly']) !!}

            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror

         </div>

         {!! Form::submit('Actualizar Categoria', ['class' => 'btn btn-primary']) !!}

        {!! Form::close()!!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
        $("#nombre").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
  });
});
    </script>
@endsection
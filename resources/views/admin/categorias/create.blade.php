@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Crear nueva Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Laravel Collective --}}
            {{-- Nos permite trabajar con todas las etiquetas que utilizamos en un formulario
                y agrega cierta logica si agregamos un formulario no se tiene que especificar el token @csrf ya que laravel
                collection se encarga de agregarlo, a demas no se tiene que poner los method old.input, Laravel se encarga de recuperar la informacion de las relaciones --}}
            {!! Form::open(['route' => 'admin.categorias.store'])!!}{{-- Esto es como si colocara <form></form> --}}

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

             {!! Form::submit('Crear Categoria', ['class' => 'btn btn-primary']) !!}

            {!! Form::close()!!}
        </div>
    </div>
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

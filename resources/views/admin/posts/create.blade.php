@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Crear Nuevo Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form group">
                    {!! Form::label('titulo', 'Titulo:') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingresar titulo del post']) !!}

                    @error('titulo')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div><br>

                <div class="form group">
                    {!! Form::label('email', 'Autor:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Autor-Derechos Reservados']) !!}

                    @error('email')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </div><br>

                <div class="form group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingresar Slug del post', 'readonly']) !!}

                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div><br>

                <div class="form group">
                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}

                    @error('categoria_id')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div><br>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('status', 1, true) !!}
                            Borrador
                    </label>
                    <label>
                        {!! Form::radio('status', 2) !!}
                            Publicar
                    </label>

                    @error('status')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                       <div class="image-wrapper">
                            <img id="imagen" src="https://cdn.pixabay.com/photo/2022/07/05/16/53/graz-7303533_960_720.jpg" alt="">
                       </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Insertar imagen que se mostrará en el post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file']) !!}
                        </div>
                    </div>
                </div><br>

                <div class="form group">
                    {!! Form::label('contenido', 'Contenido') !!}
                    {!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}

                    @error('contenido')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div><br>

                {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}



            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 40.20%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
        $("#titulo").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
  });
});

            ClassicEditor
            .create( document.querySelector( '#contenido' ) )
            .catch( error => {
                console.error( error );
            } );

    //Cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("imagen").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }

    </script>
@endsection

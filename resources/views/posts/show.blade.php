<x-app-layout>
    {{-- <link rel="stylesheet" href="{{asset('resources/css/app.css')}}"> --}}
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-10">
        <h1 class="text-4xl font-bold text-gray-600 ">{{$post->titulo}}</h1><br>
    
        <div class="grid grid-cols-3">

            {{-- contenido principal --}}
            <div class="col-span-2">
               <figure>
                   @if($post->image)
                   <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                   @else
                   <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/07/05/16/53/graz-7303533_960_720.jpg" alt="">
                    @endif
                </figure>
    
            </div>
    
            {{-- contenido relacionado 
            <aside>
                <h1>Contenido Similares{{$post->categorias->titulo}}</h1>
    
            </aside>
    --}}
        </div>

    <div class="text-lg grid grid-cols-1 text-gray-500 mb-5 py-9">
        {!!$post->contenido!!}
    </div>



</div>
    

</x-app-layout>
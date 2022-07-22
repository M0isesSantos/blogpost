<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold py-8">Categoria:{{$categorias->nombre}}</h1>

        @foreach ($posts as $post)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                @if($post->image) 
                <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                
                @else
                <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/07/05/16/53/graz-7303533_960_720.jpg" alt="">
                @endif
            
                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{route('posts.show', $post)}}">{{$post->titulo}}</a>
    
                    </h1>
                    
                </div>
            </article>
          
        @endforeach
            
        <div class="mt-4">        
            {{$posts->links()}}
           </div>
    </div>
</x-app-layout>
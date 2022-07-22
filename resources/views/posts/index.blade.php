<x-app-layout>
    <div class="container py-8 max-w-7xl mx-auto px-2">
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

       @foreach($post as $posts)
        <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($posts->image){{Storage::url($posts->image->url)}}@else https://cdn.pixabay.com/photo/2022/07/05/16/53/graz-7303533_960_720.jpg @endif)">
            <div class="w-full h-full px-8 flex flex-col justify-center">
                <div>
                    <a href="" class="inline-block px-3 h-6">
                       {{--  @foreach ($posts as $$posts)
                            <li>{{$$posts->event}} --fecha: <b><i>{{$$posts->created_at}} </i></b> </li>
                        @endforeach --}}
                        <div class="text-1xl text-white leading-2 font-bold">
                        {{date('d - M - Y //  h:i', strtotime($posts->created_at) )}}, <hr>
                        {{$posts->email}}
                    </div>

                        
                        
                    </a>
                </div>
                <h1 class="text-4xl text-white leading-8 font-bold">
                    <a href="{{route('posts.show', $posts)}}">
                        {{$posts->titulo}}
                    </a>
                </h1>
            </div>
        </article>
       @endforeach
        
       </div>
       
       <div class="mt-4">        
        {{$post->links()}}
       </div>
    
    </div>
    
</x-app-layout>
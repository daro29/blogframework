@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-8 col-lg-8 mx-auto">
                <h1>{{ $post->name }}</h1>
                    Categoría:
                    <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                    <div class="card mb-3">
                        @if($post->file)
                            <img src="{{$post->file}}" class="img-responsive card-img-top" alt="{{ $post->name }}">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->name }}</h4>
                            <p class="card-text">
                                {{ $post->excerpt }}
                            </p>
                            <hr>
                            {!! $post->body !!}
                            <hr>
                            Etiquetas:
                            @foreach ($post->tags as $tag)
                               <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                            @endforeach

                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

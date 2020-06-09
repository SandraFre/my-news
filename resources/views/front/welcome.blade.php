@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Newest</div>

    <div class="card-body">
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-md-6 mb-2 p-2">
                <h4>
                <a href="{{route('article.show', ['slug'=> $article->slug])}}" class="card-link"> {{ $article->title}}</a>
                </h4>
                <div class="">
                    @isset($article->author)
                    <p class="float-left">{{$article->author->name}}</p>
                    @endisset
                    <em class="float-right ">{{$article->created_at->format('Y-m-d H:i')}}</em>
                </div>
                <div class="">
                    @isset($article->poster)
                    <img src="{{ Storage::url($article->poster)}}" alt="" class="img-fluid">
                    @endisset
                </div>
                <div class="">
                    {{Str::limit($article->content, 200)}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        {{$articles->links()}}
    </div>
</div>

@endsection

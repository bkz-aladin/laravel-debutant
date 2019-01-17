@extends('layout')

@section('contenu_du_site')
    <h1>{{$data['article']->titleCapital()}}</h1>
    <h3>{{$data['article']->description}}</h3>
    <p>{{$data['article']->content}}</p>
    <img src="{{$data['article']->image}}" alt="">

    <ul>
        @foreach(json_decode($data['article']->tags) as $tag)
            <li>
                {{$tag}}
            </li>
        @endforeach
    </ul>
@endsection
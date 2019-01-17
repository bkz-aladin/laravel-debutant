@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mes liens</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach(Auth::user()->links as $link)
                                <li class="list-group-item">
                                    <a href="{{$link->link}}">{{$link->link}} ({{$link->short_link}})</a>
                                    <a href="/stats/{{$link->short_link}}" class="btn btn-default">Stats</a>
                                    <a href="/link/delete/{{$link->id}}" class="btn btn-default">Delete</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

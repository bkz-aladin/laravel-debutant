@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Give me a link ! </div>

                    <div class="card-body">
                        <form action="/link/generate" method="post">
                            @csrf()

                            <div class="form-group">
                                <input type="text" name="link" class="form-control" placeholder="Your link">
                            </div>

                            @if(Auth::check())
                                <div class="form-group">
                                    <input type="text" name="short_link" class="form-control" placeholder="Shorter link">
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" class="form-control" value="generer">
                            </div>
                        </form>
                    </div>

                    <div class="container">
                    @if(Session::has('link'))
                        <div class="alert alert-success">
                            <a target="_blank" href="  {{config('app.url').':8000/'.Session::get('link')}}">
                                {{config('app.url').':8000/'.Session::get('link')}}
                            </a>
                            <br>
                            <a target="_blank" href="/stats/{{Session::get('link')}}">Get your stats here ! </a>

                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

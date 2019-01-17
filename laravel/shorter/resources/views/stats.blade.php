@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stats</div>

                    <div class="card-body">
                        <h2>{{$data['link']->number_of_visitors}} redirections</h2>
                    </div>

                    <div class="container">
                        @if(Session::has('link'))
                            <div class="alert alert-success">
                                <a href="  {{config('app.url').':8000/'.Session::get('link')}}">
                                    {{config('app.url').':8000/'.Session::get('link')}}
                                </a>

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

@extends('layout')

@section('contenu_du_site')
    <form action="{{route('login.check')}}"  method="post" class="col-4">
        @csrf()
        <div class="form-group">
            <input type="text" name="email" placeholder="email" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="login" class="form-control">
        </div>
    </form>

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif

@endsection
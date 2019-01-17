@extends('layout')

@section('contenu_du_site')
    <div class="container">
        <form action="/codepin" method="post">
            @csrf()
            <div class="form-group">
                <label for="pin"> Code Pin</label>
                <input type="text" id ="pin" name="codepin" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Check" class="form-control">
            </div>
        </form>
    </div>

@endsection
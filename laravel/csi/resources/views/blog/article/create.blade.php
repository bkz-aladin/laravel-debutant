@extends('layout')

@section('contenu_du_site')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="card col-4">


            <div class="card-body">
                <div class="card-title">
                    Nouveau post
                </div>
                <form action=""  method="" class="">
                    @csrf()
                    <div class="form-group">
                        <input type="text" name="title" placeholder="titre" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="description" placeholder="description" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="contenu" placeholder="content" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="image" placeholder="image" class="form-control">
                    </div>


                    <div class="form-group">
                        <input type="text" name="tags" placeholder="tags" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit"  value="ajouter" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
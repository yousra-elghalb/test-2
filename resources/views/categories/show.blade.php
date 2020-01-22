@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>Detail Categorie</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    @if(isset($categorie->image))
                        <img src="{{ Storage::url($categorie->image->file_name)}}" width="300" height="300" alt=""
                             srcset="">
                    @else
                        <img src="/notfound.jpg" width="300" height="300" alt=""
                             srcset="">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h2>{{$categorie->name}}</h2>
                    <h3>{{$categorie->slug}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

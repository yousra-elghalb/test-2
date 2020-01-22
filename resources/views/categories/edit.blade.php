@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>Update Categorie</h3>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-10">
            <form enctype="multipart/form-data" action="{{route("categories.update",$categorie->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" value="{{ !empty(old("name"))?old("name"):$categorie->name}}"
                           class="form-control" id="name"
                           aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" value="{{!empty(old("slug"))?old("slug"):$categorie->slug}}"
                           class="form-control" id="slug"
                           aria-describedby="emailHelp">
                </div>
                <div class="row">
                    <div class="col">
                        @if(isset($categorie->image))
                            <img src="{{ Storage::url($categorie->image->file_name)}}" width="100" height="100" alt=""
                                 srcset="">
                        @else
                            <img src="/notfound.jpg" width="300" height="300" alt=""
                                 srcset="">
                        @endif
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

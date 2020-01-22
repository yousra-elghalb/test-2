@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>New Course</h3>
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
            <form enctype="multipart/form-data" action="{{route("course.store")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" value="{{old("name")}}" class="form-control" id="name"
                           aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" name="slug" value="{{old("slug")}}" class="form-control" id="slug"
                           aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                              rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>categorie</label>
                    {!! Form::select('categorie_id', $categories, null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

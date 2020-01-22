@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>@lang("messages.listCourse")</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-success" href="{{route('course.create')}}">Create new</a>
        </div>
    </div>

    @if($message =Session::get("success"))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-hover table-sm">
        <tr>
            <td>No.</td>
            <td>Name</td>
            <td>Slug</td>
            <td>Description</td>
            <td>category</td>
            <td width="350px">Actions</td>
        </tr>
        @foreach($courses as $course)
            <tr>
                <td><b>{{$course->id}}.</b></td>
                <td>{{$course->name}}</td>
                <td>{{$course->slug}}</td>
                <td>{{$course->description}}</td>
                <td>{{$course->categorie->name}}</td>

                <td>
                    <div class="row">
                        <form class="col" method="post" action="{{route('course.destroy',$course->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">@lang("messages.Delete")</button>
                        </form>
                        <div class="col">
                            <a href="{{route('course.show',$course->id)}}" class="btn btn-warning"
                               type="submit">@lang("messages.Detail")</a>
                        </div>
                        <div class="col">

                            <a href="{{route('course.edit',$course->id)}}" class="btn btn-warning"
                               type="submit">@lang("messages.Update")</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!!$courses->links() !!}
@endsection

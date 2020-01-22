@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>Detail Course</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-10">
                    @if(isset($course->image))
                        <img src="{{ Storage::url($course->image->file_name)}}" width="300" height="300" alt=""
                             srcset="">
                    @else
                        <img src="/notfound.jpg" width="300" height="300" alt=""
                             srcset="">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h2>name : {{$course->name}}</h2>
                    <h3>slug : {{$course->slug}}</h3>
                    <p>descprition : {{$course->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

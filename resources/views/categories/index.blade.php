@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>@lang("messages.listCategorie")</h3>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-success" href="{{route('categories.create')}}">Create new</a>
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
            <td width="350px">Actions</td>
        </tr>
        @foreach($categories as $categorie)
            <tr>
                <td><b>{{$categorie->id}}.</b></td>
                <td>{{$categorie->name}}</td>
                <td>{{$categorie->slug}}</td>

                <td>
                    <div class="row">
                        <form class="col" method="post" action="{{route('categories.destroy',$categorie->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">@lang("messages.Delete")</button>
                        </form>
                        <div class="col">
                            <a href="{{route('categories.show',$categorie->id)}}" class="btn btn-warning"
                               type="submit">@lang("messages.Detail")</a>
                        </div>
                        <div class="col">
                            <a href="{{route('categories.edit',$categorie->id)}}" class="btn btn-warning"
                               type="submit">@lang("messages.Update")</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {!!$categories->links() !!}
@endsection

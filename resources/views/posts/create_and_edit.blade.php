@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h1>
                <i class="glyphicon glyphicon-edit"></i> Post /
                @if($post->id)
                    Edit #{{$post->id}}
                @else
                    Create
                @endif
            </h1>
        </div>

        @include('error')

        <div class="panel-body">
            @if($post->id)
                <form action="{{ route('posts.update', $post->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
            @else
                <form action="{{ route('posts.store') }}" method="POST" accept-charset="UTF-8">
            @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                
                <div class="form-group">
                	<label for="title-field">Title</label>
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $post->title ) }}" />
                </div> 
                <div class="form-group">
                	<label for="body-field">Body</label>
                	<textarea name="body" id="body-field" class="form-control" rows="3">{{ old('body', $post->body ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $post->user_id ) }}" />
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
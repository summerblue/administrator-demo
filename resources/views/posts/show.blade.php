@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h1>Post / Show #{{ $post->id }}</h1>
        </div>

        <div class="panel-body">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-link" href="{{ route('posts.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
                    <div class="col-md-6">
                         <a class="btn btn-sm btn-warning pull-right" href="{{ route('posts.edit', $post->id) }}">
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </a>
                    </div>
                </div>
            </div>

            <label>Title</label>
<p>
	{{ $post->title }}
</p> <label>Body</label>
<p>
	{{ $post->body }}
</p> <label>User_id</label>
<p>
	{{ $post->user_id }}
</p>
        </div>

    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h1>
                <i class="glyphicon glyphicon-align-justify"></i> Post
                <a class="btn btn-success pull-right" href="{{ route('posts.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            </h1>
        </div>

        <div class="panel-body">
            @if($posts->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Title</th> <th>Body</th> <th>User_id</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-center"><strong>{{$post->id}}</strong></td>

                                <td>{{$post->title}}</td> <td>{{$post->body}}</td> <td>{{$post->user_id}}</td>
                                
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('posts.show', $post->id) }}">
                                        <i class="glyphicon glyphicon-eye-open"></i> 
                                    </a>
                                    
                                    <a class="btn btn-xs btn-warning" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="glyphicon glyphicon-edit"></i> 
                                    </a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
        </div>
    </div>
</div>

@endsection
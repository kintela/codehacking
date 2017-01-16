@extends('layouts.admin')

@section('content')



    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th></th>
            <th></th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name:'uncategorized'}}</td>
                    <td><img height="50"
                             src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,30) }}</td>
                    <td><a href="{{route('home.post',$post->id)}}">View post</a></td>
                    <td><a href="{{route('admin.comments.show',$post->id)}}">View comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>



@endsection
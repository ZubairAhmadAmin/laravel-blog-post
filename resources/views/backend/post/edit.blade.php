@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Edit Post</h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.update', ['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="form-lablel">Title</label>
                        <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Enter post title">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_title" class="form-lablel">Sub Title</label>
                        <input type="text" name="sub_title" value="{{$post->sub_title}}" class="form-control" placeholder="Enter post sub title">
                        @error('sub_title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-lablel">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control my-editor" placeholder="Enter the post description">{{$post->description}}</textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="topic">Topics:</label><br>
                        @foreach($topics as $topic)
                            <b>{{$topic->title}}</b>
                            <input type="checkbox" class="mr-2"
                            @foreach($post->topics as $postTopic)
                                @if($postTopic->id == $topic->id)
                                    checked
                                @endif
                            @endforeach
                            value="{{$topic->id}}" name="topic[]">
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
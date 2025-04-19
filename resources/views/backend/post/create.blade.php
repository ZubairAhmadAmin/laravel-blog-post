@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Create Post</h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-lablel">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter post title">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_title" class="form-lablel">Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="Enter post sub title">
                        @error('sub_title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image1" class="form-lablel">Image 1</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="image[]" placeholder="Choose image">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="image2" class="form-lablel">Image 2</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a data-input="thumbnail2" data-preview="holder" class="btn btn-primary lfm">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail2" class="form-control" type="text" name="image[]" placeholder="Choose image">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-lablel">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control my-editor" placeholder="Enter the post description"></textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="topic">Topics:</label><br>
                        @foreach($topics as $topic)
                            <b>{{$topic->title}}</b>
                            <input type="checkbox" class="mr-2" value="{{$topic->id}}" name="topic[]">
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection


@section('script')

<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
    $('.lfm').filemanager('image');
</script>

@endsection
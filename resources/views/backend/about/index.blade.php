@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">About</h3>
            </div>
            <div class="card-body">
                <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-lablel">Title</label>
                        <input type="text" name="title" value="{{$about->title}}" class="form-control" placeholder="Enter about title">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_title" class="form-lablel">Sub Title</label>
                        <input type="text" name="sub_title" value="{{$about->sub_title}}" class="form-control" placeholder="Enter about sub title">
                        @error('sub_title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-lablel">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control my-editor" placeholder="Enter about description">{{$about->description}}</textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
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
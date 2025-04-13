@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Create Role</h3>
            </div>
            <div class="card-body">
                <form action="{{route('role.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-lablel">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter post name">
                        @error('name')
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

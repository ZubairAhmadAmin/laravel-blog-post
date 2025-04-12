@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Edit User</h3>
            </div>
            <div class="card-body">
                <form action="{{route('user.update', ['user'=>$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-lablel">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-lablel">Email</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-lablel">User Role</label>
                        <select id="role" name="user_role" class="form-control">
                        <option value="admin" {{$user->user_role == 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="editor " {{$user->user_role == 'editor' ? 'selected' : ''}}>Editor</option>
                        <option value="staff" {{$user->user_role == 'staff' ? 'selected' : ''}}>Staff</option>
                        </select>
                        @error('user_role')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="form-lablel">Profile</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="avatar" value="{{ $user->profile ? $user->profile->avatar : '' }}">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
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


@section('script')

<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
    $('#lfm').filemanager('image');
</script>

@endsection
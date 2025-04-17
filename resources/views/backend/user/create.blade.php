@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Create User</h3>
            </div>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-lablel">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-lablel">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-lablel">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter your password">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-lablel">Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" placeholder="Enter your confirm password">
                        @error('confirm_password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-lablel">User Role</label>
                        <select id="role" name="user_role" class="form-control">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                        @endforeach
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
                            <input id="thumbnail" class="form-control" type="text" name="avatar" placeholder="Choose profile picture">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('avatar')
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

@section('script')

<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

<script>
    $('#lfm').filemanager('image');
</script>

@endsection

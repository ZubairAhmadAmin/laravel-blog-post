@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Assign Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{route('role.assign', ['role'=>$role_id])}}" method="post">
                    @csrf
                    <div class="row">
                        @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <span class="mr-2">{{$permission->name}}</span>
                            <input type="checkbox" class="checkbox" value="{{$permission->id}}" name="permission[]"><br><br>
                        </div>
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

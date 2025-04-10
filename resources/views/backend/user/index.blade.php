@extends('backend.layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">
                    User
                    <a class="btn btn-primary float-right" href="{{route('user.create')}}">Add User</a>
                    <br>
                    <br>
                </h3>
            </div>
            <div class="card-body">
                <div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Profile Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> -->
                        <tbody>
                            @foreach($users as $index=>$user)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{optional($user->profile)->avatar}}</td>
                                <td>
                                    <a href="#" class="delete" id="{{$user->id}}"><i class="fas fa-trash"></i></a> |
                                    <a href="{{route('user.edit', ['user'=>$user->id])}}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <tfoot>
                    </tfoot>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

@endsection


@section('script')
<script>
    $('.delete').click(function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You will be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                var id = $(this).attr('id');
                var url = 'user/' + id;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'DELETE',
                    datatype: 'json',
                    data: {
                        "_method": 'DELETE',
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        location.reload();
                    }
                });

            }
        });
    })
</script>
@endsection
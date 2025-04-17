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
                    Role
                    @if(auth()->user()->role->hasPermission('role create'))
                    <a class="btn btn-primary float-right" href="{{route('role.create')}}">Add Role</a>
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                @if(auth()->user()->role->hasPermission(['role update', 'role delete', 'role show']))
                                <th>Action</th>
                                @endif
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
                            @foreach($roles as $index=>$role)
                            <tr>
                                <td>{{($roles->currentPage() * 10) - 10 + $index + 1}}</td>
                                <td>{{ucfirst($role->name)}}</td>
                                <td>
                                    @if(auth()->user()->role->hasPermission('role delete'))
                                    <a href="#" class="delete" id="{{$role->id}}"><i class="fas fa-trash"></i></a>
                                    @endif
                                    @if(auth()->user()->role->hasPermission('role update'))
                                    <a href="{{route('role.edit', ['role'=>$role->id])}}"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if(auth()->user()->role->hasPermission('role show'))
                                    <a href="{{route('role.show', ['role'=>$role->id])}}"><i class="fas fa-lock"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <tfoot>
                        {{$roles->links()}}
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
                var url = 'role/' + id;
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
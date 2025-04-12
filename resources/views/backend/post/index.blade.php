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
                    Post
                    <a class="btn btn-primary float-right" href="{{route('post.create')}}">Add Post</a>
                    <br>
                    <br>
                    @can('forceDelete', App\Models\Post::class)
                    <a class="btn btn-danger float-right" href="{{route('post.trash')}}">Trash</a>
                    @endcan
                </h3>
            </div>
            @php
                $user = auth()->user();
            @endphp
            <div class="card-body">
                <div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Author</th>
                                @if(in_array($user->user_role, ['admin', 'editor']))
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
                            @foreach($posts as $index=>$post)
                            <tr>
                                <td>{{($posts->currentPage() * 10) - 10 + $index + 1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->sub_title}}</td>
                                <td>@if($post->profile && $post->profile->user)
                                        {{ $post->profile->user->name }}
                                    @else
                                        <em>No user</em>
                                    @endif
                                </td>
                                <td>    
                                    @can('delete', $post)
                                    <a href="#" class="delete" id="{{$post->id}}"><i class="fas fa-trash"></i></a> |
                                    @endcan
                                    @can('update', $post)
                                    <a href="{{route('post.edit', ['post'=>$post->id])}}"><i class="fas fa-edit"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <tfoot>
                        {{$posts->links()}}
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
                var url = 'post/' + id;
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
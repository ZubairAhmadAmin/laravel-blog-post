@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Setting</h3>
            </div>
            <div class="card-body">
                <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="logo" class="form-lablel">Logo</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" value="{{$setting->logo}}" name="logo" placeholder="Choose website logo">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        @error('logo')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="form-lablel">Facebook</label>
                        <input type="text" value="{{$setting->facebook}}" name="facebook" class="form-control" placeholder="Enter website facebook">
                        @error('facebook')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="form-lablel">Twitter</label>
                        <input type="text" value="{{$setting->twitter}}" name="twitter" class="form-control" placeholder="Enter website twitter">
                        @error('twitter')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-lablel">Email</label>
                        <input type="text" value="{{$setting->email}}" name="email" class="form-control" placeholder="Enter website email">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-lablel">Phone</label>
                        <input type="text" vvalue="{{$setting->phone}}" name="phone" class="form-control" placeholder="Enter website phone number">
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-lablel">Address</label>
                        <input type="text" value="{{$setting->address}}" name="address" class="form-control" placeholder="Enter about your address">
                        @error('address')
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

@extends('.admin.Layouts.admin_layout')
@section('title',$user->name)

@section('content')
    <div class="profile-wrapper container" style="height: 100vh; width: 100%; margin-top: 0;">
        <div style="background-image:url({{ asset('img/bg-img/13.jpg') }});    width: 100%;height: 36vh;background-repeat: no-repeat;margin: auto; background-size: cover; ">

            @if($user->img_url != null)
                <img src="{{ asset($user->img_url) }}"alt="profile" style="width: 18%; border-radius: 1px 1px 10px 10px; border: 2px solid; box-shadow: black 3px 5px 10px;">
            @else
                <img src="{{ asset('img/camera-icon.jpg') }}"alt="profile" style="width: 18%; border-radius: 1px 1px 10px 10px; border: 2px solid; box-shadow: black 3px 5px 10px;">
            @endif
            <button type="button" class="float-right"
                    style=" padding: 10px; border: none; border-radius: 32px; box-shadow: grey -3px 2px 10px; margin: 8px; width: 40px;"
                    data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </div>
        <div style="background: #ffe3e6; height: 64%;">
            <hr>
            <div class="row">
                <div class="col-md-4 float-right"><h5 class="float-right">Name :</h5></div>
                <div class="col-md-8"><p class="px-5">{{$user->name }}</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 float-right"><h5 class="float-right">Email :</h5></div>
                <div class="col-md-8"><p class="px-5">{{$user->email }}</p></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 float-right"><h5 class="float-right">Address :</h5></div>

                @if($user->address != null)
                    <div class="col-md-8"><p class="px-5">{{$user->address }}</p></div>
                @else
                    <div class="col-md-8"><p class="px-5"> {{ ' Not Given' }} </p></div>
                @endif

            </div>
            <hr>
            <div class="row">
                <div class="col-md-4 float-right"><h5 class="float-right">Contact :</h5></div>

                @if($user->contact != null)
                    <div class="col-md-8"><p class="px-5">{{ $user->contact }}</p></div>
                @else
                    <div class="col-md-8"><p class="px-5"> {{ ' Not Given' }} </p></div>
                @endif
            </div>
            <hr>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade p-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('admin.users.modify') }}" enctype="multipart/form-data">
                <div class="modal-content p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div>
                            @if($user->img_url !=null)
                                <img src="{{ asset($user->img_url) }} " style="width: 50px; height: 50px ;"  alt="">
                                <input type="file" name="inputImage" class="form-control" id="inputImage" value="{{ asset($user->img_url) }}" style="border: none; background:#e88f8f; margin: 10px;">
                            @else
                                <img src="{{ asset('img/camera-icon.jpg') }} " style="width: 50px; height: 50px ;"  alt="">
                                <input type="file" name="inputImage" class="form-control" id="inputImage" style="border: none; background:#e88f8f; margin: 10px;">
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mx-3" name="name" id="name" required value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="email">Email</label>
                                <div class="row">
                                    <input type="email" class="form-control mx-3" name="email" id="email" required value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <div class="row">
                                @if($user->address != null)
                                    <input type="text" class="form-control" name="address" id="inputAddress"  value="{{ $user->address }}">
                                @else
                                    <input type="text" class="form-control" name="address" id="inputAddress"  value="">
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <div class="row">
                                @if($user->contact != null)
                                    <input type="text" class="form-control" name="contact" id="contact"  value="{{ $user->contact }}">
                                @else
                                    <input type="text" class="form-control" name="contact" id="contact"  value="">
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <input type="hidden" name="id" value="{{ $user->id }}"/>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection


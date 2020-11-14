@extends('.admin.Layouts.admin_layout')
@section('title','All User')
@section('content')
    <div class="m-5">
        <div class="table100 ver5 m-b-110">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col" style=" width: 15%; ">Name</th>
                    <th scope="col" style="  ">Email</th>
                    <th scope="col" style="  "> </th>
                    <th scope="col" style=" width: 22%; ">address</th>
                    <th scope="col" style=" width: 22%; ">Contact</th>
                    <th scope="col" style=" width: 5%; "></th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $s_user)
                    <tr>
                        <th scope="row">{{ $s_user->name }}</th>
                        <td>{{ $s_user->email }}</td>
                        <td>
                            @if($s_user->img_url == null)
                                <img src="{{ asset('image/cam.jpg') }}" alt="" style="width: 50px; height: 50px;  border-radius: 50px;">
                            @else
                                <img src="{{ asset( $s_user->img_url) }}" alt="" style="width: 50px; height: 50px;  border-radius: 50px;">
                            @endif
                        </td>
                        <td>{{ $s_user->address }}</td>

                        <td class="justify-content-between d-flex text-center">
                            <span style="font-family:  'Roboto Mono', monospace;  font-size: 16px; color: darkred; text-align: center;">{{ $s_user->contact }}</span>
                        </td>
                        <td>
                            <div class="d-block ml-1">
                                <div > <a type="button" class="float-right bg-transparent" href="{{ route('admin.user',['id' => $s_user->id ]) }}"> <i class="fa fa-eye float-right"></i> </a></div>
                                <div >
                                    <a type="button" class="float-right bg-transparent" href="{{ route('admin.user',['id' => $s_user->id]) }}"> <i class="fa fa-pencil float-right"></i> </a>
                                </div>
                                <div >
                                    <form action="{{ route('admin.users.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $s_user->id }}"><br>
                                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!--show Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    @if($s_user->img_ur == null)
                                        <img src="{{ asset('image/cam.jpg') }}" alt="" style="width: 100px; height: 100px;">
                                     @else
                                        <img src="{{ asset( $s_user->img_url) }}" alt="" style="width: 100%;">
                                    @endif

                                </div>
                                <div class="modal-body">
                                    <div class="d-block category-modal-item">{{  $s_user->name }}</div>
                                    <div class="d-block category-modal-item">{{  $s_user->email }}</div>

                                    @if($s_user->address!= null)
                                        <div class="d-block category-modal-item">{{  $s_user->address }}</div>
                                    @endif
                                    @if($s_user->contact!= null)
                                        <<div class="d-block category-modal-item">{{  $s_user->contact }}</div>
                                    @endif
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="p-3">
                                        {{  $s_user->address }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->

@endsection

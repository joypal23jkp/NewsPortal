@extends('.admin.Layouts.admin_layout')
@section('title','Dashboard')
@section('content')
    <div class="dashboard-body">
        <div class="top-analysing row">
            <div class="col-md-4">
                <div class="news-data rounded-circle text-center text-white">
                    <h5>{{ \App\Models\News::all()->count() }} <i class="fa fa-newspaper-o" aria-hidden="true"></i></h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="user-data rounded-circle text-center text-white justify-content-center">
                    <h5><span> {{ \App\User::all()->count() }}</span> <i class="fa fa-users" aria-hidden="true"></i> </h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="comment-data rounded-circle text-center text-white">
                    <h5>{{ \App\Models\Comments::all()->count() }} <i class="fa fa-comments" aria-hidden="true"></i> </h5>
                </div>
            </div>
        </div>
    </div>

@endsection


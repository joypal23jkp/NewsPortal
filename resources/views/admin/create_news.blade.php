@extends('.admin.Layouts.admin_layout')
@section('title','Add News')
@section('content')
    <div class="container create-news-wrapper">
        <form method="post" action="{{ route('admin.profile.upload.news') }}" enctype="multipart/form-data">
            @csrf
            <div class="card border-0" style="font-family: 'Roboto Mono', monospace;">
                <div class="card-header bg-white">
                    <h2>Add News</h2>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="file" name="inputImage" class="form-control" id="inputImage" style="border: none; background:#e88f8f; ">
                        </div>
                        <div class="form-group col-md-6">
                            {{--                    <img src="/image/{{ Session::get('path') }}" width="300" alt="image">--}}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="inputTitle" class="form-control" id="inputTitle" placeholder="Title">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCategory">Category</label>
{{--                            <input type="text" name="inputCategory" class="form-control " id="inputCategory" placeholder="Category">--}}
                            <select class="form-control" id="inputCategory" name="inputCategory">
                                <option>Entertainment</option>
                                <option>Sports</option>
                                <option>Information-technology</option>
                                <option>Travel</option>
                                <option>Business</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Body</label>
                        <textarea rows="5" name="inputBody" class="form-control" id="inputBody"></textarea>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button type="submit" class="btn post-button text-uppercase">Post News</button>
                </div>
            </div>

        </form>
    </div>
    <style>
        .create-news-wrapper{
            width: 50%;
            background: white;
            border-radius: 10px;
            box-shadow: #e88f8f 2px 5px 41px;
            padding: 49px;
            margin-top: 30px;
        }
        .post-button{
            background:#e88f8f;
            width: 100%;
            transition: 1s;
        }
        .post-button:hover{
            background: #e8515a;
            font-weight: bold;
            border-radius: 45px;
        }
    </style>
@endsection

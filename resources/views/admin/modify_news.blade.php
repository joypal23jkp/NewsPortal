@extends('.admin.Layouts.admin_layout')
@section('title', $news->title)
@section('content')
    <div class="header text-center pt-3">
    Update News
</div>
    <div class="container modify-news-container">

        <form method="post" action="{{ route('admin.profile.update') }}">
            <div class="form-group">
                <label for="category">Category </label>
                <select class="form-control" id="inputCategory" name="inputCategory">
                    <option>Entertainment</option>
                    <option>Sports</option>
                    <option>Information-technology</option>
                    <option>Travel</option>
                    <option>Business</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Title </label>
                <input type="text" class="form-control text-selector" name="title" id="title" value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <input type='file' class="image-selector" name="inputImage"  />
                @if($news->img_url == null)
                <img id="blah" src="{{ asset('img\core-img\camera-icon.jpg') }}" alt="your image" style="max-width:180px; max-height: 22vh;"/>
                @else
                <img id="blah" src="{{ asset($news->img_url) }}" alt="your image" style="max-width:180px; max-height: 22vh;"/>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Body</label>
                <textarea  class="form-control body-selector" name="body" rows="6" id="exampleFormControlTextarea1" >{{ $news->body}}</textarea>
            </div>
            <div class="form-group">
               <input type="submit" class="btn btn btn-block btn-primary" value="Update" >
               <input type="hidden" class="btn btn btn-block btn-primary" value="{{ $news->slug }}" >
            </div>
        </form>
    </div>
    <script>
    </script>

@endsection


@extends('.admin.Layouts.admin_layout')
@section('title','All News')
@section('content')
   <div class="m-5">
       <div class="table100 ver5 m-b-110">
               <table class="table table-hover">
                   <thead>
                   <tr>
                       <th scope="col" style=" width: 10%; ">Category</th>
                       <th scope="col" style="  ">Title</th>
                       <th scope="col" style="  ">Body</th>
                       <th scope="col" style=" width: 10%; ">CreatedAt</th>
                       <th scope="col" style=" width: 10%; ">Likes</th>
                       <th scope="col" style=" width: 5%; "></th>

                   </tr>
                   </thead>
                   <tbody>
                   @foreach($news as $s_news)
                       <tr>
                           <th scope="row">{{ $s_news->category }}</th>
                           <td>{{ $s_news->title }}</td>
                           <td>{{ $s_news->body }}</td>
                           <td>{{ $s_news->created_at }}</td>

                           <td class="justify-content-between d-flex text-center">
                               <span style="font-family:  'Roboto Mono', monospace; font-weight: bold; font-size: 31px; color: darkred; text-align: center;">{{ $s_news->likes }}</span>
                           </td>
                           <td>

{{--                                 <ul>--}}
{{--                                     <li style="list-style: none;">--}}
{{--                                         <a href="{{ route('admin.single.news',['id' => $s_news->id]) }}"  class="float-right bg-transparent"> <i class="fa fa-eye float-right"></i> </a>--}}
{{--                                     </li>--}}
{{--                                     <li style="list-style: none;">--}}
{{--                                         <a href="{{ route('admin.news.modify.show',['id' => $s_news->id]) }}" class="float-right bg-transparent"> <i class="fa fa-pencil float-right"></i> </a>--}}
{{--                                     </li>--}}
{{--                                     <li style="list-style: none;">--}}
{{--                                         <form action="{{ route('admin.news.delete') }}" method="post">--}}
{{--                                             @csrf--}}
{{--                                             <input type="hidden" name="news_id" value="{{ $s_news->id }}"><br>--}}
{{--                                             <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>--}}
{{--                                         </form>--}}
{{--                                     </li>--}}
{{--                                 </ul>--}}
                              <div>
                                  <a href="{{ route('admin.single.news',['id' => $s_news->id]) }}"  class="float-right bg-transparent px-3"> <i class="fa fa-eye float-right"></i> </a>
                                  <a href="{{ route('admin.news.modify.show',['id' => $s_news->id]) }}" class="float-right bg-transparent px-3"> <i class="fa fa-pencil float-right"></i> </a>
                              </div>
                               <form action="{{ route('admin.news.delete') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $s_news->id }}"><br>
                                    <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                           </td>
                       </tr>
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">


                                       <div class="d-block category-modal-item">{{ $s_news->category }}</div>
                                       <h5 class="modal-title" id="exampleModalLongTitle">{{ $s_news->title }}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       <img src="{{ asset($s_news->img_url) }}" alt="" style="width: 100%;">
                                       <div class="p-3">
                                           {{ $s_news->body }}
                                       </div>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                       <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content p-3">
                                   <form method="post" action="{{ route('admin.news.modify') }}">
                                       @csrf
                                       <div class="form-row">
                                           <div class="form-group col-md-6">
                                               <label for="inputCategory">{{ $s_news->category }}</label>
                                               <input type="category" class="form-control" name="category" id="inputCategory" value="{{ $s_news->category }}">
                                               <input type="hidden" class="form-control" name="slug" value="{{ $s_news->slug }}">
                                           </div>
                                       </div>
                                       <div class="form-group">
                                           <label for="inputTitle">Title</label>
                                           <input type="text" class="form-control" name="title" id="inputTitle" value="{{ $s_news->title }}">
                                       </div>
                                       <div class="form-group">
                                           <label for="inputBody">Body</label>
                                           <textarea class="form-control" name="body" rows="4" cols="5" id="inputBody" >{{ $s_news->body }}</textarea>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                       </div>
                                   </form>

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

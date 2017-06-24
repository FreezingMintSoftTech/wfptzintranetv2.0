<?php
$news_posts = App\News::where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
$news_count = App\News::where('status', 1)->orderBy('created_at', 'desc')->count();
$news_post_count = 1;
?>
@if($news_count != 0)
<div class="row">
    <div class="col-md-12" style="background-color:">
        
        <a class="btn btn-success btn-lg float-right hidden-sm-down {{ Auth::user()->department == 'PI'? '':'invisible'}}" href="{{URL::to('/create_news_post')}}" role="button">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
        </a>
        <a class="btn btn-success float-right hidden-md-up {{ Auth::user()->department == 'PI'? '':'invisible'}}" href="{{URL::to('/create_news_post')}}" role="button">
            <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
        </a>

        <button type="button" class="btn btn-primary btn-lg float-left hidden-sm-down" onclick="location.href = '{{URL::to('/previous')}}'"><i class="fa fa-calendar" aria-hidden="true"></i> News Calender</button>
        <button type="button" class="btn btn-primary float-left hidden-md-up" onclick="location.href = '{{URL::to('/previous')}}'"><i class="fa fa-calendar" aria-hidden="true"></i> News</button>
        
        <h1 class="text-center featurette-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</h1>
    </div>
</div>
@else
    @if(Auth::user()->department == 'PI')
        <div class="row">
            <div class="col-md-12" style="background-color:">
                @if(Auth::user()->department == 'PI')
                <a class="btn btn-success btn-lg float-right hidden-sm-down" href="{{URL::to('/create_news_post')}}" role="button">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
                </a>
                <a class="btn btn-success float-right hidden-md-up" href="{{URL::to('/create_news_post')}}" role="button">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
                </a>
                @endif
                <h1 class="text-center featurette-heading"><span class="invisible">News</span></h1>
            </div>
        </div>
    @endif
@endif

<!-- START THE FEATURETTES -->
@foreach ($news_posts as $news_post)
@if($news_post_count%2 == 1)
<div class="row featurette align-items-center">
    <div class="col-md-6" style="background-color:">
        <h3 class="featurette-heading hidden-md-down text-primary">{{ substr(strip_tags($news_post->header),0,65) }}{{ strlen(strip_tags($news_post->header)) > 65 ? "...":"" }}</h3>
        <h2 class="hidden-lg-up text-justify"><small class="text-primary">{{ substr(strip_tags($news_post->header),0,65) }}{{ strlen(strip_tags($news_post->header)) > 65 ? "...":"" }}</small></h2>

        <img class="featurette-image img-fluid mx-auto hidden-md-up" src="{{url('/storage/thumbnails/'.$news_post->image)}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        <hr class="hidden-md-up">

        <blockquote class="blockquote blockquote-reverse">
            <p class="lead text-justify">
                {{ substr(strip_tags($news_post->description),0,250) }}{{ strlen(strip_tags($news_post->description)) > 250 ? "...":"" }} 
                <br>
                
                <span class="badge badge-pill badge-success">45 Views</span>
                <span class="badge badge-pill badge-primary">12 Likes</span>
                <span class="badge badge-pill badge-default">2 Comments</span>
                <br>
                
                <a class="btn btn-success btn-sm" href="{{URL::to('/read_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-leanpub" aria-hidden="true"></i> Read more
                </a>
                <a class="btn btn-primary btn-sm" href="{{URL::to('/like_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> like
                </a>
                <a class="btn btn-secondary btn-sm" href="{{URL::to('/like_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> comment
                </a>
                @if(Auth::user()->department == 'PI')
                <a class="btn btn-warning btn-sm" href="{{URL::to('/edit_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                </a>
                <a class="btn btn-danger btn-sm" href="{{URL::to('/remove_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                </a>
                @endif                
            </p>

            <footer class="blockquote-footer">Source <cite title="Source Title">{{ $news_post->source }}</cite></footer>
        </blockquote>
    </div>

    <div class="col-md-6 hidden-sm-down" style="background-color:">
        <img class="featurette-image img-fluid mx-auto" src="{{url('/storage/thumbnails/'.$news_post->image)}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
    </div>
</div>

<hr>
@else
<div class="row featurette align-items-center" style="background-color:">
    <div class="col-md-6 push-md-6">
        <h3 class="featurette-heading hidden-md-down text-primary">{{ substr(strip_tags($news_post->header),0,65) }}{{ strlen(strip_tags($news_post->header)) > 65 ? "...":"" }}</h3>
        <h2 class="hidden-lg-up text-justify"><small class="text-primary">{{ substr(strip_tags($news_post->header),0,65) }}{{ strlen(strip_tags($news_post->header)) > 65 ? "...":"" }}</small></h2>

        <img class="featurette-image img-fluid mx-auto hidden-md-up" src="{{url('/storage/thumbnails/'.$news_post->image)}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        <hr class="hidden-md-up">

        <blockquote class="blockquote">
            <p class="text-justify lead"> 
                {{ substr(strip_tags($news_post->description),0,250) }}{{ strlen(strip_tags($news_post->description)) > 250 ? "...":"" }}<br>
                <a class="btn btn-success btn-sm" href="{{URL::to('/read_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-leanpub" aria-hidden="true"></i> Read more
                </a>
                <a class="btn btn-primary btn-sm" href="{{URL::to('/like_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> like
                </a>
                <a class="btn btn-secondary btn-sm" href="{{URL::to('/like_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> comment
                </a>
                @if(Auth::user()->department == 'PI')
                <a class="btn btn-warning btn-sm" href="{{URL::to('/edit_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                </a>
                <a class="btn btn-danger btn-sm" href="{{URL::to('/remove_news_post/'.$news_post->id)}}" role="button">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Remove
                </a>
                @endif
                <br>
                <span class="badge badge-pill badge-success">45 Views</span>
                <span class="badge badge-pill badge-primary">12 Likes</span>
                <span class="badge badge-pill badge-default">2 Comments</span>
            </p>

            <footer class="blockquote-footer">Source <cite title="Source Title">{{ $news_post->source }}</cite></footer>
        </blockquote>
    </div>
    <div class="col-md-6 pull-md-6  hidden-sm-down">
        <img class="featurette-image img-fluid mx-auto" src="{{url('/storage/thumbnails/'.$news_post->image)}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
    </div>
</div>

<hr>
@endif
<?php ++$news_post_count; ?>
@endforeach


<div class="col-12">
    <nav aria-label="Page navigation example">
        {{ $news_posts->links('vendor.pagination.bootstrap-4') }}

        {{ $news_posts->links('vendor.pagination.bootstrap-4-small') }}
    </nav>
</div>

@if(Session::has('news_post_id'))
<!-- Edit News Modal -->
{{Form::open(array('url' => '/edit_news_post/'.Session::get('news_post_id'),'enctype' => "multipart/form-data",'role' => 'form'))}}
<div class="modal fade add-news-modal" id="add-news-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit News Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="headerText"><strong>Header</strong></label>
                            @if(old('header'))
                            <input type="text" name='header' value="{{ (old('header')) }}" class="form-control" id="headerText" aria-describedby="text" placeholder="Enter News Post Header">
                            @elseif(Session::has('news_post_id'))
                            <input type="text" name='header' value="{{ App\News::find(Session::get('news_post_id'))->header }}" class="form-control" id="headerText" aria-describedby="text" placeholder="Enter News Post Header">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Image</strong></label><br>
                            <img class="featurette-image img-fluid mx-auto img-thumbnail" src="{{url('/storage/'.App\News::find(Session::get('news_post_id'))->image)}}">
                            <hr>
                            @if(old('image'))
                            <input type="file" name='image' value="{{ (old('image')) }}" id="image" class="form-control">
                            @elseif(Session::has('news_post_id'))
                            <input type="file" name='image' value="{{ App\News::find(Session::get('news_post_id'))->image }}" id="image" class="form-control">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="source"><strong>Source</strong></label>
                            @if(old('source'))
                            <input type="text" name='source' value="{{ (old('source')) }}" class="form-control" id="source" aria-describedby="text" placeholder="Enter Source">
                            @elseif(Session::has('news_post_id'))
                            <input type="text" name='source' value="{{ App\News::find(Session::get('news_post_id'))->source }}" class="form-control" id="source" aria-describedby="text" placeholder="Enter Source">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="descriptionTextarea"><strong>Description</strong></label>
                            @if(old('source'))
                            <textarea class="form-control" name='description' id="descriptionTextarea" rows="5">{{ (old('description')) }}</textarea>
                            @elseif(Session::has('news_post_id'))
                            <textarea class="form-control" name='description' id="descriptionTextarea" rows="5">{{ App\News::find(Session::get('news_post_id'))->description }}</textarea>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="storyTextarea"><strong>Story</strong></label>
                            @if(old('story'))
                            <textarea class="form-control" name='story' id="storyTextarea" rows="10">{{ (old('story')) }}</textarea>
                            @elseif(Session::has('news_post_id'))
                            <textarea class="form-control" name='story' id="storyTextarea" rows="10">{{ App\News::find(Session::get('news_post_id'))->story }}</textarea>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        @if(Session::has('new_news_post_error') || Session::has('edit_news_post_error'))
                        <div class="panel-footer">
                            <div class="alert alert-danger">{{$errors->first()}}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-inverse text-white">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-lg" aria-hidden="true"></i> Edit News Post</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close fa-lg" aria-hidden="true"></i> Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{Form::token()}}
{{Form::close()}}<!-- end Edit News Modal -->
@elseif(Session::has('create_news_post') || Session::has('new_news_post_error'))
<!-- Add News Modal -->
{{Form::open(array('url' => '/store_news_post','enctype' => "multipart/form-data",'role' => 'form'))}}
<div class="modal fade add-news-modal" id="add-news-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add News Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="headerText"><strong>Header</strong></label>
                            <input type="text" name='header' value="{{ (old('header')) }}" class="form-control" id="headerText" aria-describedby="text" placeholder="Enter News Post Header">
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Image</strong></label>
                            <input type="file" name='image' value="{{ (old('image')) }}" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="source"><strong>Source</strong></label>
                            <input type="text" name='source' value="{{ (old('source')) }}" class="form-control" id="source" aria-describedby="text" placeholder="Enter Source">
                        </div>
                        <div class="form-group">
                            <label for="headerText"><strong>Description</strong></label>
                            <textarea class="form-control" name='description' id="exampleTextarea" rows="5">{{ (old('description')) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="headerText"><strong>Story</strong></label>
                            <textarea class="form-control" name='story' id="exampleTextarea" rows="10">{{ (old('story')) }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        @if(Session::has('new_news_post_error'))
                        <div class="panel-footer">
                            <div class="alert alert-danger">{{ $errors->first() }}</div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-inverse text-white">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-edit fa-lg" aria-hidden="true"></i> Create News Post</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close fa-lg" aria-hidden="true"></i> Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{Form::token()}}
{{Form::close()}}<!-- end Add News Modal -->
@endif

<!-- start of News Pop Up Modal -->
@if(Session::has('read_news_post'))
<div class="modal fade read-news-modal" id='read-news-modal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">{{ App\News::find(Session::get('read_news_post'))->header }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img class="featurette-image img-fluid mx-auto d-flex justify-content-center" src="{{url('/storage/'.App\News::find(Session::get('read_news_post'))->image)}}" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                        <hr>
                    </div>
                    <div class="col-12">
                        <blockquote class="blockquote">
                            <p class="text-justify lead">
                                {!! App\News::find(Session::get('read_news_post'))->description !!}
                            </p>
                            <footer class="blockquote-footer">Source <cite title="Source Title" class=" text-primary">{{ App\News::find(Session::get('read_news_post'))->source }}</cite></footer>
                        </blockquote>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                {!! App\News::find(Session::get('read_news_post'))->story !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <br>
                        <blockquote class="blockquote blockquote-reverse">
                            <p class="mb-0">By <em class="text-primary">{{ App\User::find(App\News::find(Session::get('read_news_post'))->created_by)->firstname.' '.App\User::find(App\News::find(Session::get('read_news_post'))->created_by)->secondname }}</em></p>
                            <footer class="blockquote-footer text-success"><cite title="Source Title">{{ App\News::find(Session::get('read_news_post'))->created_at }}</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-inverse text-white">
                @if(Auth::user()->department == 'PI')
                <a class="btn btn-warning" href="{{URL::to('/edit_news_post/'.Session::get('read_news_post'))}}" role="button">
                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i> Edit News Post
                </a>
                @endif
                <a class="btn btn-danger" data-dismiss="modal" role="button">
                    <i class="fa fa-close fa-lg" aria-hidden="true"></i> Close
                </a>
            </div>
        </div>
    </div>
</div><!-- /.end News Modal -->
@endif
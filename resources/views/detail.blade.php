@extends('layout.master')

@section('content')
<div class="col-md-7">
    <div class="card card-dark">
        <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card card-dark">
                                        <div class="card-body">
                                                <div class="row">
                                                        <!-- icons -->
                                                        <div class="col-md-4">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-md-4 text-center">
                                                                                <i id="like" class="fas fa-heart text-warning">
                                                                                </i>
                                                                                <small id="like_count" class="text-muted">{{$article->like_count}}</small>
                                                                        </div>
                                                                        <div
                                                                                class="col-md-4 text-center">
                                                                                <i
                                                                                        class="far fa-comment text-dark"></i>
                                                                                <small
                                                                                        class="text-muted">{{$article->comment_count}}</small>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                        <!-- Icons -->

                                                        <!-- Category -->
                                                        <div class="col-md-4">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-md-12">
                                                                                <a href=""
                                                                                        class="badge badge-primary">{{$article->category->name}}</a>

                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- Category -->


                                                        <!-- Category -->
                                                        <div class="col-md-4">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-md-12">
                                                                                @foreach ($article->language as $i)
                                                                                <a href="{{url('language/'.$i->slug)}}" class="badge badge-success">{{$i->name}}</a>
                                                                                @endforeach
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- Category -->

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <br>
                <div class="col-md-12">
                        <h3>{{$article->title}}</h3>
                        <p>
                            {{$article->description}}
                        </p>
                </div>

                <!-- Comments -->
                <div class="card card-dark">
                        <div class="card-header">
                                <h4>Comments</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="text" id="comment" class="form-control">
                                        <input type="submit" value="Create" class="btn btn-primary" id='create_comment'>
                                    </div>
                                    </div>
                            </div>
                                <!-- Loop Comment -->
                                <div id="comment_list">
                                    @foreach ($article->comment as $c)
                                    <div class='card-dark mt-1'>
                                        <div class='card-body mb-2'>
                                            <div class='row'>
                                                    <div
                                                            class='col-md-4 d-flex align-items-center'>
                                                            {{$c->user->name}}
                                                    </div>
                                            </div>
                                            <hr>
                                            <p>{{$c->comment}}</p><br>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                        </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        const like=document.querySelector('#like');
        const like_count=document.querySelector('#like_count');

        like.addEventListener('click',()=>{
            axios.get('/article/like/'+{{$article->id}})
            .then(res=>{
                toastr.success('like success');
                like_count.innerHTML=res.data.data;
            })
        });

        const comment=document.getElementById('comment');
        const comment_list=document.getElementById('comment_list');
        const create_comment=document.getElementById('create_comment');

        create_comment.addEventListener('click',function(){
            const formData=new FormData();
            formData.append('comment',comment.value);
            formData.append('article_id',"{{$article->id}}");
            axios.post('/comment/create/',formData)
            .then(function(res){
                toastr.success('Comment success');
                comment_list.innerHTML=res.data.data;
            });
        });
    </script>
@endsection

@extends('layout.master')

@section('content')
       <!-- Content -->
       <div class="col-md-8">
        <div class="card card-dark">
                <div class="card-body">
                        <a href="{{$posts->previousPageUrl()}}" class="btn btn-danger">Prev Posts</a>
                        <a href="{{$posts->nextPageUrl()}}" class="btn btn-danger float-right">Next Posts</a>
                </div>
        </div>
        <div class="card card-dark">
                <div class="card-body">
                        <div class="row">
                                <!-- Loop this -->
                                @foreach ($posts as $p)
                                <div class="col-md-4 mt-2 m-1">
                                    <div class="card" style="width: 18rem;">
                                            <img class="card-img-top"
                                                    src="{{asset($p->image)}}"
                                                    alt="Card image cap">
                                            <div class="card-body">
                                                    <h5 class="text-dark">{{$p->name}}</h5>
                                            </div>
                                            <div class="card-footer">
                                                    <div class="row">
                                                            <div
                                                                    class="col-md-4 text-center">
                                                                    <i
                                                                            class="fas fa-heart text-warning">
                                                                    </i>
                                                                    <small
                                                                            class="text-muted">{{$p->like_count}}</small>
                                                            </div>
                                                            <div
                                                                    class="col-md-4 text-center">
                                                                    <i
                                                                            class="far fa-comment text-dark"></i>
                                                                    <small
                                                                            class="text-muted">{{$p->comment_count}}</small>
                                                            </div>
                                                            <div
                                                                    class="col-md-4 text-center">
                                                                    <a href="{{url('detail/'.$p->slug)}}"
                                                                            class="badge badge-warning p-1">View</a>
                                                            </div>
                                                    </div>

                                            </div>
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

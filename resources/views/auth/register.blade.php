@extends('layout.master')

@section('content')
 <!-- Content -->
 <div class="col-md-8">

         <div class="card card-dark">
                 <div class="card-header bg-warning">
                         <h3>Register</h3>
                 </div>
                 <div class="card-body">
                         <form action="{{route('user.register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                 <div class="form-group">
                                         <label for="" class="text-white">Enter Username</label>
                                         <input type="name" class="form-control"
                                                 placeholder="enter username" name="name">
                                 </div>
                                 <div class="form-group">
                                    <label for="" class="text-white">Email</label>
                                    <input type="name" class="form-control"
                                            placeholder="enter Email" name="mail">
                                </div>
                                <div class="form-group">
                                        <label for="" class="text-white">Enter Password</label>
                                        <input type="password" class="form-control"
                                                placeholder="enter password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-white">Choose image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                 <input type="submit" value="Register"
                                         class="btn  btn-outline-warning">
                         </form>
                 </div>
         </div>
 </div>

</div>
</div>
@endsection

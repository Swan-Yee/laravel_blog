@extends('layout.master')

@section('content')
      <!-- Content -->
      <div class="col-md-8">

          <div class="card card-dark">
                  <div class="card-header bg-warning">
                          <h3>Login</h3>
                  </div>
                  <div class="card-body">
                          <form action="{{route('user.login')}}" method="post">
                            @csrf
                                  <div class="form-group">
                                          <label for="" class="text-white">Enter mail</label>
                                          <input type="email" class="form-control"
                                                  placeholder="enter mail" name="mail">
                                  </div>
                                  <div class="form-group">
                                          <label for="" class="text-white">Enter Password</label>
                                          <input type="password" class="form-control"
                                                  placeholder="enter password" name="password">
                                  </div>
                                  <input type="submit" value="Login"
                                          class="btn  btn-outline-warning">
                          </form>
                  </div>
          </div>
  </div>
@endsection

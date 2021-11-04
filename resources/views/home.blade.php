@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                  <form action="{{url('/search/result')}}" method="post">
                    @csrf
                      <div class="input-group">
                          <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" name="search">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-lg btn-primary">
                                  <i class="fa fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                  @php
                  if(!empty($result))
                    print_r($result);
                  @endphp
              </div>
          </div>
      </div>
  </section>
@endsection
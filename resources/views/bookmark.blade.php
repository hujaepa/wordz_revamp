@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                @if (!empty($words))
                    <div class="d-flex justify-content-center m-1">
                        <h4>Total Words: {{$total}}</h4>
                    </div>
                    <ul class="list-group">
                        @foreach ($words as $w)
                            <li class="list-group-item text-muted">
                                <div class="float-left">{{ucwords($w->word)}}</div>
                                <div class="float-right">
                                    <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @if(!empty($words->links()))
                        <div class="d-flex justify-content-center p-3">
                            {{$words->links()}}
                        </div>
                    @endif
                @endif
              </div>
          </div>
      </div>
  </section>
@endsection
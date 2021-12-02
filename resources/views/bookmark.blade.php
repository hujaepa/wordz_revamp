@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                @if (!empty($words))
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
                @endif
              </div>
          </div>
      </div>
  </section>
@endsection
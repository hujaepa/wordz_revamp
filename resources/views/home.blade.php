@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12 offset-md-2">
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
                 @if (!empty($result))
                     <div class="card card-outline card-success m-5">
                         <div class="card-header">
                             <h4 class="font-italic">{{$result[0]->word}}</h4>
                         </div>
                         <div class="card-body">

                            @if (!empty($result[0]->meanings))
                            <div class="meaning m-2">
                                <span class="text-muted">Definitions</span>
                                <ul>
                                    @foreach ($result[0]->meanings[0]->definitions as $d)
                                        <li>{{$d->definition}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="synonym m-2">
                                @foreach ($result[0]->meanings[0]->definitions as $d)
                                    @if (!empty($d->synonyms))
                                        <span class="text-muted">Synonyms:</span>
                                        @foreach ($d->synonyms as $s)
                                            {{$s}},
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            @if (!empty($result[0]->phonetics[0]->audio))
                              <audio controls>
                                <source src="{{$result[0]->phonetics[0]->audio}}" type="audio/mpeg">
                              </audio>
                            @endif

                         </div>
                     </div>
                 @endif
              </div>
          </div>
      </div>
  </section>
@endsection
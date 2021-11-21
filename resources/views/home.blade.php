@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                  <form action="{{route('home.search')}}" method="post">
                    @csrf
                      <div class="input-group">
                          <input type="search" class="form-control form-control-lg" id="keyword" placeholder="Type your keywords here" name="search" value="<?php echo (!empty($keyword)) ? $keyword:'';?>">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-lg btn-primary">
                                  <i class="fa fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </form>
                 @if (!empty($result) && is_array($result))
                     <div class="card card-outline card-success m-5" id="result">
                         <div class="card-header">
                            <div class="float-left">
                                <h2 class="font-italic">{{$result[0]->word}}</h2>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-primary" id="add-word">
                                    <i class="fa fa-star text-warning"></i> Add to favourites
                                </button>
                            </div>
                         </div>
                         <div class="card-body">
                            <div class="audio justify-content-md-center">
                            @if (!empty($result[0]->phonetics[0]->audio))
                            <span class="text-muted">Pronounciation</span>
                                <br>
                                <audio controls>
                                <source src="{{$result[0]->phonetics[0]->audio}}" type="audio/mpeg">
                                </audio>
                            @endif
                            </div>

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
                                            <span class="badge badge-primary ml-1">{{$s}}</span>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                         </div>
                     </div>
                    @else
                        {{--No Result Found--}}
                        @if(!empty($keyword))
                            <div class="row m-2">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <h3 class="text-muted">Sorry, no result found.</h3>
                                </div>
                            </div>
                        @endif
                    @endif
              </div>
          </div>
      </div>
  </section>
  <script>
      $("#keyword").on("keyup click", function(){
        if($(this).val()===''){
            $("#result").remove();
        }
      });

      $("#add-word").click(function(){
        $(this).attr("class","btn btn-secondary font-italic");
        $(this).attr("disabled",true);
        $(this).text("added to favourites");
        toastr.success("Succesfully added to favourites");
      });
  </script>
@endsection
@extends('layouts.main.master')
@section('content')
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 offset-md-2">
                 @if (!empty($result) && is_array($result))
                     <div class="card card-outline card-success" id="result">
                         <div class="card-header">
                            <div class="float-left">
                                <h2 class="font-italic" id="word">{{$result[0]->word}}</h2>
                            </div>
                            <div class="float-right">
                                <a class="btn bg-primary" href="/bookmark/list/{{Auth::user()->id}}">
                                    <i class="fas fa-arrow-alt-circle-left"></i> Back
                                </a>
                            </div>
                         </div>
                         <div class="card-body">
                            <div class="audio justify-content-md-center">
                            @if (!empty($result[0]->phonetics[0]->audio))
                                <span class="text-muted">Pronounciation</span>
                                <br>
                                <audio controls style="width:100%; max-width:300px">
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
                                @if (!empty($result[0]->meanings[0]->partOfSpeech))
                                    <div class="partOfSpeech m-2">
                                        <span class="text-muted">Part Of Speech</span>
                                        <ul>
                                            <li>{{$result[0]->meanings[0]->partOfSpeech}}</li>
                                        </ul>
                                    </div>
                                @endif
                            @endif
                            
                            <div class="example m-2">
                                <span class="text-muted">Example:</span>
                                <ul>
                                    @foreach ($result[0]->meanings[0]->definitions as $d)
                                        @if (!empty($d->example))
                                            <li>{{$d->example}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="synonym m-2">
                                <span class="text-muted">Synonyms:</span>
                                @foreach ($result[0]->meanings[0]->definitions as $d)
                                    @if (!empty($d->synonyms))
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
@endsection
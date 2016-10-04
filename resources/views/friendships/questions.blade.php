@extends('layouts.app1')

@section('content')
  @foreach($friends as $friend)
    @foreach($friend->questions as $question)
      @foreach($questions_order as $q_order)
        @if($question->id == $q_order->id)
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="index-post">
                  <div class="post-box">
                    <div class="profile-pic-post pull-left">
                      <a href="{{ url('profile/'.$question->user_id) }}">
                        <img class="profile-post-pic" src="{{ $friend->img_profile }}">
                      </a>
                    </div>
                    <div class="post-title-desc">
                      <a href="{{ url('perguntas/' . $question->id) }}">
                        <h4 class="title">{{ $question->title }}</h4>
                      </a>
                      <h6 class="desc">{{ $question->description }}</h6>
                    </div>

                    @if ($question->img_path != NULL)
                      <div class="thumbnail post-img">
                        <img src="question_uploads/{{ $question->img_path }}" style="width:500px;height:auto;">
                      </div>
                    @endif

                    <div class="post-footer">
                      <script>
                        likes(<?= $question->id ?>);
                      </script>

                      <div>
                        <a class="pull-left likes" id="question-<?= $question->id ?>" data-toggle="modal" data-target="#modal-question-<?= $question->id?>"></a>

                        <div id="modal-question-<?= $question->id?>" style="margin-top:15% !important" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Curtidas</h4>
                              </div>
                              <div class="modal-body body-<?= $question->id?>"></div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="button" class="btn pull-left" onclick="like(<?=Auth::user()->id?>,<?=$question->id?>)">
                          <span class="glyphicon glyphicon-thumbs-up like" aria-hidden="true"></span>
                        </button>
                      </div>

                      <button type="button" class="btn pull-left">
                        <span class="glyphicon glyphicon-comment comment" aria-hidden="true"></span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    @endforeach
  @endforeach
@endsection
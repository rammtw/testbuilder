@extends('layouts.interface')

@section('title')
    {{ $question->title }}
@stop

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <p>Вопрос {{ $count['current']}} из {{ $count['all'] }}</p>

                {{ Form::open(array('action' => 'QuestionController@setAnswer')) }}
                <p>{{{ $question->title }}}</p>

                @foreach($answers as $key => $answer)
                    <div class="form-group">
                        <input type="{{ $question->type }}" name="a_indexes[]" value="{{{$answer['answer']}}}" autocomplete="off"> {{{ $answer['answer'] }}}
                    </div>
                @endforeach

                <button type="submit" class="btn btn-success" style="margin-top:25px;">Далее</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop

@section('script')
<script>
    $('form').submit(function(){
        $(this).find('button').attr('disabled', 'disabled');
    });
</script>
@stop
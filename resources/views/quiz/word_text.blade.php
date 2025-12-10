@extends('layouts.main', ['title' => 'Word Quiz'])

@section('content')

    <div class="quiz-container">    
        <h1>Question : {{ $question_number }}</h1>
        <div class="quiz-question">
            <h1>{{ $question }}</h1>
            <p class="kana-type">Translate to English</p>
        </div>

        <form action="{{ route('quiz.word-text-process') }}" method="POST" >
            @csrf
            
            <div class="text-input-container">
                <input type="text" name="meaning" class="text-input-field" placeholder="Type the meaning..." autofocus autocomplete="off">
            </div>
            
            <button type="submit" class="btn-action clickable-sound">Next Question</button>
        </form>

        <div class="view-result-container">
            <form action="{{ route('quiz.result-text',['quiz_level' => 'word']) }}" method="get" id="quiz-form">
                @if ($question_number >= 2)
                    <input type="hidden" name="quiz_level" value="word">
                    <button type="submit" class="btn-view-result result-sound">Finish & View Result</button>
                @endif
            </form>
        </div>
    </div>
@endsection

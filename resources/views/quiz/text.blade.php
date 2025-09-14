@extends('layouts.main', ['title' => 'Fill in the blank'])

@section('content')

    <button id="hint-btn" class="hint-button clickable-sound">?</button>

    <dialog id="hintModal">
        <div class="modal-content">
            <span id="close-modal-btn" class="close-button">&times;</span>
            <img src="{{ asset('img/hiragana.jpg') }}" alt="Hiragana Chart">
            <img src="{{ asset('img/katakana.jpg') }}" alt="Katakana Chart">
        </div>
    </dialog>

    
    <div id="overall-timer-container"
             data-time-left="{{ $timeLeft ?? 0 }}"
             data-results-url="{{ route('quiz.result') }}">
            Time Left: <span id="timer-minutes">01</span>:<span id="timer-seconds">00</span>
        </div>

    <div class="quiz-container">
        <h1>Question : {{ $question_number }}</h1>
        <div class="quiz-question">
            <h1>{{ $correctAnswer->character }}</h1>
            <p class="kana-type">{{ $correctAnswer->type }}</p>
        </div>

        <form action="{{ route('quiz.text-process') }}" method="POST" >
            @csrf
            <input type="hidden" name="correct_answer_id" value="{{ $correctAnswer->idcharacters }}">
            
            <input type="hidden" name="level" value="text">

            <div class="text-input-container">
                
                <input type="text" name="romaji" class="text-input-field" placeholder="Type here..." autofocus>
            </div>
            
            
            <button type="submit" class="btn-action clickable-sound">Next Question</button>
        </form>

        <div class="view-result-container">
            <form action="{{ route('quiz.result-text',['quiz_level' => 'text']) }}" method="get" id="quiz-form">
                
                @if ($question_number >= 2)
                    <input type="hidden" name="quiz_level" value="text">
                    <button type="submit" class="btn-view-result result-sound">Finish & View Result</button>
                @endif
            </form>
        </div>
    </div>
@endsection

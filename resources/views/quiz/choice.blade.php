@extends('layouts.main', ['title' => 'Multiple Choice'])

@section('content')
  
    <button id="hint-btn" class="hint-button clickable-sound">?</button>

     <dialog id="hintModal">
    <div id="hint-modal" class="modal-overlay">
        <div class="modal-content">
            <span id="close-modal-btn" class="close-button">&times;</span>
            
            <img src="{{ asset('img/hiragana.jpg') }}" alt="Hiragana and Katakana Chart">
            <img src="{{ asset('img/katakana.jpg') }}" alt="Hiragana and Katakana Chart">
        </div>
    </div>
     </dialog>

    <div class="quiz-container">
        <h1>Question : {{ $question_number }}</h1>
        <div class="quiz-question">
            <h1>{{ $correctAnswer->character }}</h1>
            <p class="kana-type">{{ $correctAnswer->type }}</p>
        </div>

        <form action="{{ route('quiz.process') }}" method="POST">
            @csrf
            @yield('quiz_level')
            <input type="hidden" name="correct_answer_id" value="{{ $correctAnswer->idcharacters }}">

            <div class="quiz-choices">
                @foreach ($options as $choice)
                    <button type="submit" name="choice" value="{{ $choice->idcharacters }}"
                        class="choice-btn clickable-sound">
                        {{ $choice->romaji }}
                    </button>
                @endforeach
            </div>

        </form>

        <div class="view-result-container">
            <form action="{{ route('quiz.result') }}" method="POST">
                @csrf
                @if ($question_number >= 2)
                    <input type="hidden" name="quiz_level" value="{{$quiz_level}}">
                    <button type="submit" class="btn-view-result result-sound">Finish & View Result</button>
                @endif
            </form>
        </div>
    </div>
@endsection

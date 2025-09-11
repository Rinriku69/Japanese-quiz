@extends('layouts.main', ['title' => 'Test Result'])

@section('content')
<div class="content-wrapper">
    <div class="results-container">
        <h1>Quiz Complete!</h1>

        <div class="score-summary">
            <p>Your Score</p>
            <div class="score-circle">
                <span>{{ $score }} / {{ $total }}</span>
            </div>
        </div>

        <div class="answer-review">
            <h2>Answer Review</h2>
            @foreach ($answers as $answer)
                @php
                    $isCorrect = $answer['user_choice']['idcharacters'] === $answer['correct_answer']['idcharacters'];
                @endphp
                <div class="answer-item {{ $isCorrect ? 'correct' : 'incorrect' }}">
                    <div class="question-character">
                        {{ $answer['correct_answer']['character'] }}
                    </div>
                    <div class="answer-details">
                        <p>Your Answer: <strong>{{ $answer['user_choice']['romaji'] }}</strong></p>
                        @if (!$isCorrect)
                            <p class="correct-answer-text">Correct Answer: <strong>{{ $answer['correct_answer']['romaji'] }}</strong></p>
                        @endif
                    </div>
                    <div class="answer-icon">
                        {!! $isCorrect ? '&#10004;' : '&#10006;' !!} {{-- Renders a checkmark or an X --}}
                    </div>
                </div>
            @endforeach
        </div>
        
        <form action="{{route('quiz.restart')}}" method="POST">
            @csrf
            <input type="hidden" name="quiz_level" value="{{$quiz_level}}">
        <div class="results-actions">
            <button type="submit" class="btn-retry-quiz clickable-sound">Retry Quiz</button>
        </div>
    </form>
    </div>
</div>
@endsection


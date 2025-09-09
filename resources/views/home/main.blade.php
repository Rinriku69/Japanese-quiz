@extends('layouts.main', ['title' => 'Quiz Selection'])

@section('content')
<div class="content-wrapper">
    <div class="quiz-selection-container">
        <h1>Choose Your Quiz</h1>

        
        <div class="quiz-option-card">
            <div>
                <h2>Hiragana & Katakana</h2>
                <p>A multiple-choice quiz on basic character readings.</p>
            </div>
            <form action="{{ route('quiz.intermediate') }}" method="get">
                
                <button type="submit" class="btn-start-quiz">Start Quiz</button>
            </form>
        </div>

        
        <div class="quiz-option-card disabled">
             <div>
                <h2>Kanji Basics</h2>
                <p>Test your knowledge of the first 20 JLPT N5 Kanji.</p>
            </div>
            <button class="btn-start-quiz" disabled>Coming Soon</button>
        </div>

    </div>
</div>
@endsection


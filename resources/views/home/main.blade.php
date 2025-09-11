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
                <form action="{{ route('quiz.start') }}" method="post">
                    @csrf
                    <input type="hidden" name="quiz_level" value="intermediate">
                    <button type="submit" class="btn-start-quiz">Start Quiz</button>
                </form>
            </div>
            <div class="quiz-option-card">
                <div>
                    <h2>Hiragana & Katakana Beginner</h2>
                    <p>A multiple-choice quiz on basic character readings.</p>
                </div>
                <form action="{{ route('quiz.start') }}" method="post">
                    @csrf
                   <input type="hidden" name="quiz_level" value="beginner">
                   <label for="id_range">Practice characters up to...</label>
                <select name="id_range" id="id_range" class="form-control">
                    <option value="10">The first 10 (あ to こ)</option>
                    <option value="20">The first 20 (あ to と)</option>
                    <option value="30">The first 30 (あ to の)</option>
                    <option value="46">All Hiragana (あ to ん)</option>
                </select>
                </label>
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

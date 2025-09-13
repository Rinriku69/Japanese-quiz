@extends('layouts.main', ['title' => 'Drawing Quiz'])

@section('content')
    <div class="content-wrapper">
        <div class="drawing-quiz-container">
            <h1>Draw the Character</h1>
            <p>Read the Romaji below and draw the matching Hiragana or Katakana character.</p>

            {{-- The Romaji prompt for the user --}}
            <div class="romaji-prompt">
                {{ $characterToDraw->romaji }}
            </div>

            {{-- The container for the canvas and the answer overlay --}}
            <div class="canvas-container">
                <canvas id="drawing-canvas" width="400" height="400"></canvas>
                {{-- The correct answer, hidden by default --}}
                <div id="answer-overlay" class="hidden">
                    <div class="answer-character">{{ $characterToDraw->character }}</div>
                </div>
            </div>

            {{-- Control buttons for the user --}}
            <div class="controls">
                <button id="finish-btn" class="btn-action clickable-sound">Finish & See Answer</button>
                <button id="clear-btn" class="btn-secondary clickable-sound">Clear</button>
                <a href="{{ route('quiz.drawing') }}" class="btn-action clickable-sound">Next Character</a>
            </div>
        </div>
    </div>

@endsection

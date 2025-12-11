@extends('layouts.main', ['title' => 'Quiz Details'])

@section('content')
<div class="content-wrapper">
    <div class="header-actions">
        <a href="{{ route('user.profile') }}" class="back-link">&larr; Back to Profile</a>
        
        <form action="{{ route('user.attempt.destroy', $attempt->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Delete Record</button>
        </form>
    </div>

    <div class="score-summary">
        <h1>Quiz Details</h1>
        <p class="detail-meta">
            <strong>Date:</strong> {{ $attempt->created_at->format('M d, Y H:i') }} <br>
            <strong>Type:</strong> <span class="capitalize">{{ $attempt->quiz_type }}</span>
        </p>
        <div class="score-circle">
            <span>{{ $attempt->score }} / {{ $attempt->total_questions }}</span>
        </div>
    </div>

    <div class="answer-review">
        <h2>Question Breakdown</h2>
        @foreach ($attempt->answers as $answer)
            <div class="answer-item {{ $answer->is_correct ? 'correct' : 'incorrect' }}">
                <div class="question-character">
                    {{ $answer->question_text ?? '?' }}
                </div>
                <div class="answer-details">
                    <p>Your Answer: <strong>{{ $answer->user_answer }}</strong></p>
                    @if (!$answer->is_correct)
                        <p class="correct-answer-text">Correct Answer: <strong>{{ $answer->correct_answer_text }}</strong></p>
                    @endif
                </div>
                <div class="answer-icon">
                    {!! $answer->is_correct ? '&#10004;' : '&#10006;' !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .back-link {
        text-decoration: none;
        color: var(--primary-color);
        font-weight: bold;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-delete:hover {
        background-color: #c82333;
    }
    .detail-meta {
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }
</style>
@endsection

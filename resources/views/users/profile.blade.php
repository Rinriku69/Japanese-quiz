@extends('layouts.main', ['title' => 'User Profile'])

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <h1>User Profile</h1>
        <div class="user-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}</p>
        </div>
    </div>

    <div class="quiz-history">
        <h2>Quiz History</h2>
        
        @if($attempts->isEmpty())
            <p class="no-history">You haven't taken any quizzes yet.</p>
        @else
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Score</th>
                        <th>Total</th>
                        <th>Result</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attempts as $attempt)
                    <tr>
                        <td>{{ $attempt->created_at->format('Y-m-d H:i') }}</td>
                        <td class="capitalize">{{ ucfirst($attempt->quiz_type) }}</td>
                        <td>{{ $attempt->score }}</td>
                        <td>{{ $attempt->total_questions }}</td>
                        <td>
                            @php
                                $percentage = ($attempt->total_questions > 0) ? ($attempt->score / $attempt->total_questions) * 100 : 0;
                            @endphp
                            {{ number_format($percentage, 0) }}%
                        </td>
                        <td>
                            <a href="{{ route('user.attempt.show', $attempt->id) }}" class="btn-sm btn-view">View</a>
                            
                            <form action="{{ route('user.attempt.destroy', $attempt->id) }}" method="POST" onsubmit="return confirm('Delete this record?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-sm btn-delete-icon" title="Delete">&times;</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<style>
    .profile-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .user-info {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #eee;
    }
    .user-info p {
        margin: 0.5rem 0;
        font-size: 1.1rem;
    }
    .history-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }
    .history-table th, .history-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .history-table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .capitalize {
        text-transform: capitalize;
    }
    .no-history {
        color: #777;
        font-style: italic;
    }
    .btn-sm {
        padding: 4px 8px;
        font-size: 0.85rem;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        margin-right: 5px;
    }
    .btn-view {
        background-color: #4a90e2;
        color: white;
    }
    .btn-delete-icon {
        background-color: #ffcccc;
        color: #d9534f;
        border: none;
        border-radius: 4px;
        padding: 4px 8px;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-delete-icon:hover {
        background-color: #d9534f;
        color: white;
    }
</style>
@endsection

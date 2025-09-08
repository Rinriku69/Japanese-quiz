@extends('layouts.main', ['title' => 'Multiple Choice'])

@section('content')

  
    <div class="quiz-container">
      <h1>Question : {{$question_number}}</h1>
        <div class="quiz-question">
            <h1>{{ $correctAnswer->character }}</h1>
            <p class="kana-type">{{ $correctAnswer->type }}</p>
        </div>

        <form action="{{ route('quiz.process') }}" method="POST">
            @csrf
            {{-- We need to pass the correct answer's ID to the next page to check if the user was right --}}
            <input type="hidden" name="correct_answer_id" value="{{ $correctAnswer->idcharacters }}">

            <div class="quiz-choices">
                @foreach ($options as $choice)
                    {{-- The name of the button is "choice" so we can retrieve it in the controller --}}
                    <button type="submit" name="choice" value="{{ $choice->idcharacters }}" class="choice-btn">
                        {{ $choice->romaji }}
                    </button>
                @endforeach
            </div>
        </form>
        <form action="{{route('quiz.result')}}" method="POST">
            @csrf
            @if(    $question_number >= 2)
            
             <p> haha</p>
             <input type="hidden" name="result" value="">
             
             <button type="submit">View Result</button> @endif
        </form>
    </div>
@endsection

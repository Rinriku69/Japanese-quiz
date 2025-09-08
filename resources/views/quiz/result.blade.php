@extends('layouts.main',['title' => "Test Result"])

@section('content')
    Correct Answer: {{$score}} / {{$total}}
    <br><br>
    @foreach ($answers as $answer)
    
    Question:  {{$answer['correct_answer']['character']}}--->
    Correct Answer:  {{$answer['correct_answer']['romaji']}}
    <br>
    Your Answer:
    {{$answer['user_choice']['romaji']}}
    <br><br>
    
        
    @endforeach
    
@endsection
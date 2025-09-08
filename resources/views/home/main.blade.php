@extends('layouts.main', ['title' =>'Quiz Selection'])

@section('content')
    <form action="{{route('quiz.form')}}" method="get" id="multiple choice">
        @csrf
        <label > Hiragana & Katakana Multiple Choice <br>
            <button type="submit">Test</button></label>
    </form>
@endsection

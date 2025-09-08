@extends('layouts.main', [
    'title' => 'Library',
])

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('library.add_characters') }}">Add new Character</a>
        <br>
        <a href="{{ route('library.characters') }}">View all characters</a>
    </div>
@endsection

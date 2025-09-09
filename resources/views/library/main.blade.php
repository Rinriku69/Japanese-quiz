@extends('layouts.main', [
    'title' => 'Library',
])

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('library.add_characters') }}" class="library-link">Add new Character</a>
        <br>
        <a href="{{ route('library.characters') }}" class="library-link">View all characters</a>
    </div>
@endsection

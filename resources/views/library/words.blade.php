@extends('layouts.main',['title' => 'Words'])

@section('content')
    <div class="content-wrapper">
        <h1>All Words</h1>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hiragana</th>
                        <th>Kanji</th>
                        <th>Romaji</th>
                        <th>Meaning</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($words as $word)
                        <tr>
                            <td>{{ $word->id }}</td>
                            <td>{{ $word->word_hiragana }}</td>
                            <td>{{ $word->word_kanji }}</td>
                            <td>{{ $word->romaji }}</td>
                            <td>{{ $word->meaning }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

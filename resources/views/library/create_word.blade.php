@extends('layouts.main',
['title' => "Add Word"])

@section('content')
    <div class="content-wrapper">
        <h1>Add a New Word</h1>
        <div class="form-container">
            <form action="{{ route('library.store_word') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="word_hiragana"><b>Hiragana</b></label>
                    <input type="text" id="word_hiragana" name="word_hiragana" class="form-control" required placeholder="e.g. ありがとう">
                </div>

                <div class="form-group">
                    <label for="word_kanji"><b>Kanji (Optional)</b></label>
                    <input type="text" id="word_kanji" name="word_kanji" class="form-control" placeholder="e.g. 有難う">
                </div>

                <div class="form-group">
                    <label for="romaji"><b>Romaji</b></label>
                    <input type="text" id="romaji" name="romaji" class="form-control" required placeholder="e.g. arigatou">
                </div>

                <div class="form-group">
                    <label for="meaning"><b>Meaning</b></label>
                    <input type="text" id="meaning" name="meaning" class="form-control" required placeholder="e.g. Thank you">
                </div>
                
                <button type="submit" class="btn btn-primary">Add Word</button>
            </form>
        </div>
    </div>
@endsection

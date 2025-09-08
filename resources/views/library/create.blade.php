@extends('layouts.main',
['title' => "Add info"])

@section('content')
    <div class="content-wrapper">
        <h1>Add a New Character</h1>
        <div class="form-container">
            <form action="{{ route('library.create') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="character"><b>Character</b></label>
                    <input type="text" id="character" name="character" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="romaji"><b>Romaji</b></label>
                    <input type="text" id="romaji" name="romaji" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="type"><b>Type</b></label>
                    <select name="type" id="type" class="form-select">
                        <option value="hiragana">Hiragana</option>
                        <option value="katagana">Katakana</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Create Character</button>
            </form>
        </div>
    </div>
@endsection
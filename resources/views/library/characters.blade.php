@extends('layouts.main',['title' => 'Characters'])

@section('content')
    <div class="content-wrapper">
        <h1>All Characters</h1>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Character</th>
                        <th>Romaji</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                        <tr>
                            <td>{{ $character->idcharacters }}</td>
                            <td>{{ $character->character }}</td>
                            <td>{{ $character->romaji }}</td>
                            <td>{{ $character->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

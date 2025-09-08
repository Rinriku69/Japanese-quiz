<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;


class LibraryController extends Controller
{
    function library(): View{
        return view('library.main');
    }

    function show_characters(): View{
        $characters = Character::get();
        return view('library.characters',
        ['characters'=> $characters]);
    }

    function add_characters(): View{
        return view('library.create');
    }

    function create(ServerRequestInterface $request): RedirectResponse{
        $character = Character::create($request->getParsedBody());
    
        return redirect()->route('library.characters');
    }

}

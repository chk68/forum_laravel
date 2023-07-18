<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $threads = Thread::where('title', 'LIKE', "%$query%")
            ->orWhere('body', 'LIKE', "%$query%")
            ->paginate(10);

        return view('search.results', compact('threads', 'query'));
    }
}

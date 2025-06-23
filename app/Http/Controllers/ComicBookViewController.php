<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComicBookView;


class ComicBookViewController extends Controller
{
    //
      public function index()
    {
        $views = ComicBookView::first()->views ?? 0;
        return response()->json(['views' => $views]);
    }

    public function increment()
    {
        $view = ComicBookView::first();
        if ($view) {
            $view->increment('views');
        } else {
            ComicBookView::create(['views' => 1]);
        }

        return response()->json(['message' => 'View counted']);
    }
}

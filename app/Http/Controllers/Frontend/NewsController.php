<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
   
public function index()
{
    $news = News::orderBy('news_date', 'desc')->get();

    // Ambil berita utama (berita terbaru)
    $featuredNews = $news->first();

    // Ambil 3 berita terbaru selain berita utama
    $recentNews = $news->skip(1)->take(3);

    // Sisanya untuk bagian "Berita Lainnya"
    $otherNews = $news->skip(4);

    return view('news-list', compact('featuredNews', 'recentNews', 'otherNews'));
}
public function show($id)
    {
        // Ambil berita yang dipilih berdasarkan ID
        $featuredNews = News::findOrFail($id);

        // Ambil berita terbaru, tetapi exclude berita utama yang sedang ditampilkan
        $news = News::orderBy('news_date', 'desc')->get();
        $recentNews = $news->where('id', '!=', $featuredNews->id)->take(3);

        // Sisanya untuk bagian "Berita Lainnya"
        $otherNews = $news->where('id', '!=', $featuredNews->id)->skip(3);

        return view('show-news', compact('featuredNews', 'recentNews', 'otherNews'));
    }
}

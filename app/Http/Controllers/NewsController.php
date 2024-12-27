<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('features.news', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_date' => 'required|date',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'news_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/news', $image, 'public');
        }

        $user = Auth::user();

        News::create([
            'image' => $image,
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_date' => $request->news_date,
            'news_author' => $user->name,
        ]);

        return redirect()->back()->with('success', 'News successfully created.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'news_title' => 'required|string|max:255',
            'news_content' => 'required|string',
            'news_date' => 'required|date',
        ]);

        $news = News::findOrFail($id);

        $image = $news->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'news_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/news', $image, 'public');
            if ($news->image) {
                Storage::disk('public')->delete('/img/news/' . $news->image);
            }
        }
        $user = Auth::user();

        $news->update([
            'image' => $image,
            'news_title' => $request->news_title,
            'news_content' => $request->news_content,
            'news_date' => $request->news_date,
            'news_author' => $user->name,
        ]);

        return redirect()->back()->with('success', 'News successfully updated.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete('/img/news/' . $news->image);
        }

        $news->delete();

        return redirect()->back()->with('success', 'News successfully deleted.');
    }
}

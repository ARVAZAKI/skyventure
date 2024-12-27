@extends('layouts.client')
@section('content')
<div class="container my-4">
    <!-- Header Section -->
    <div class="row mt-5">
        <div class="col-md-8 mt-5">
            <!-- Berita Utama -->
            <h2>{{ $featuredNews->news_title }}</h2>
            <img src="{{ asset('storage/img/news/' . $featuredNews->image) }}" alt="Berita Utama" class="img-fluid my-3">
            <div class="d-flex gap-3">
                {!! $featuredNews->news_content !!}
            </div>
            <div class="d-flex gap-3">
                Author: {{ $featuredNews->news_author }}
            </div>
        </div>
        <div class="col-md-4 mt-5">
            <!-- Sidebar -->
            <h5 class="border-bottom pb-2">Terbaru</h5>
            <ol class="list-group list-group-numbered">
                @foreach ($recentNews as $news)
                    <a href="{{ route('news.show', $news->id) }}">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $loop->iteration }}. {{ $news->news_title }}</div>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ol>
        </div>
    </div>

    <!-- Berita Lainnya Section -->
    <div class="row mt-5">
        <h5 class="border-bottom pb-2">Berita Lainnya</h5>
        @foreach ($otherNews as $news)
            <div class="col-md-2">
                <a href="{{ route('news.show', $news->id) }}">
                    <img src="{{ asset('storage/img/news/' . $news->image) }}" alt="Berita" class="img-fluid">
                    <p class="mt-2">{{ \Illuminate\Support\Str::limit($news->news_title, 50) }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

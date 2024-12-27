@extends('layouts.client')
@section('content')

<section class="event-list section mt-5">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-center">Daftar Event</h2>
    </div>
    <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
            @forelse ($events as $event)
                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="event-box text-center p-4" style="background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="event-image mb-3" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 8px;">
                            <img src="{{ 'storage/img/events/' . $event->image }}" alt="{{ $event->event_name }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                        </div>
                        <h4 class="event-name mb-2" style="color: #333; font-weight: 600;">{{ $event->event_name }}</h4>
                        <p class="event-date mb-3" style="color: #666; font-size: 14px;">{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada event yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

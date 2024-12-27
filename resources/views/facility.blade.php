@extends('layouts.client')
@section('content')

<section class="features-cards section mt-5">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-center">Fasilitas</h2>
    </div>
    <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
            @forelse ($facilities as $facility)
            <!-- Fasilitas -->
            <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="feature-box text-center p-4" style="background-color: #e6f7ff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="feature-image mb-3" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 8px;">
                        <img src="{{ asset('storage/img/facility/' . $facility->image) }}" alt="{{ $facility->name }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                    <h4 class="feature-title mb-3" style="color: #333; font-weight: 600;">{{ $facility->facility_name }}</h4>
                </div>
            </div>
            <!-- End Fasilitas -->
            @empty
            <p class="text-center">Belum ada fasilitas yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection

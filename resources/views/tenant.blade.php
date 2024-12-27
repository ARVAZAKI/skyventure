@extends('layouts.client')
@section('content')

<section class="tenant-list section mt-5">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-center">Daftar Tenant</h2>
    </div>
    <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
            @foreach ($tenants as $tenant)
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="tenant-box text-center p-4" style="background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="tenant-image mb-3" style="height: 100px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 50%;">
                        <img src="{{ 'storage/img/tenants/' . $tenant->image}}" alt="{{ $tenant->tenant_name }}" style="width: 100px; height: 100px; object-fit: cover; transition: transform 0.3s ease;">
                    </div>
                    <h4 class="tenant-name mb-2" style="color: #333; font-weight: 600;">{{ $tenant->tenant_name }}</h4>
                    <p class="tenant-description mb-3" style="color: #666; font-size: 14px;">{{ $tenant->tenant_description }}</p>
                    @if($tenant->tenant_website)
                        <a href="{{ $tenant->tenant_website }}" target="_blank" class="btn btn-primary" style="padding: 10px 20px; font-size: 14px;">Kunjungi Website</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

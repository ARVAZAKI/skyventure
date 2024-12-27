<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Tenant;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    $event = Event::orderBy('event_date', 'asc')->take(2)->get();
    $news = News::orderBy('news_date', 'desc')->take(3)->get(); 
    $tenant = Tenant::all(); 
    $tenant_count = Tenant::count();
    $facility_count = Facility::count();
    
    return view('welcome', compact('event', 'news', 'tenant', 'tenant_count', 'facility_count'));
}

}

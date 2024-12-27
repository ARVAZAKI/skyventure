<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index() {
        $facilities = Facility::all();
        return view('features.facilities', compact('facilities'));
    }

    public function listFacilities(){
        $facilities = Facility::all();
        return view('facility', compact('facilities'));
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg', // Tambahkan batas ukuran file
        'facility_name' => 'required|string|max:255',
    ]);

    $image = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $image = 'facility_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/img/facility', $image, 'public');
    }

    Facility::create([
        'image' => $image,
        'facility_name' => $request->facility_name,
    ]);

    return redirect()->back()->with('success', 'Facility successfully created.');
}


    public function update(Request $request, $id){
    $request->validate([
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        'facility_name' => 'required|string|max:255',
    ]);

    $facility = Facility::findOrFail($id);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $image = 'facility_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/img/facility', $image, 'public');
        Storage::delete('/img/facility/' . $facility->image);
    }
   else {
        $image = $facility->image; 
    }

    $facility->update([
        'image' => $image,
        'facility_name' => $request->facility_name,
    ]);

    return redirect()->back();
}
public function delete($id)
    {
    $facility = Facility::findOrFail($id);

    if ($facility->image && Storage::exists($facility->image)) {
        Storage::delete($facility->image);
    }

    $facility->delete();

    return redirect()->back();
    }


}

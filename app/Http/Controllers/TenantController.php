<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('features.tenants', compact('tenants'));
    }
    public function listTenants(){
        $tenants = Tenant::all();
        return view('tenant', compact('tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            'tenant_name' => 'required|string|max:255',
            'tenant_description' => 'required|string',
            'tenant_website' => 'nullable|url',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'tenant_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/tenants', $image, 'public');
        }

        Tenant::create([
            'image' => $image,
            'tenant_name' => $request->tenant_name,
            'tenant_description' => $request->tenant_description,
            'tenant_website' => $request->tenant_website,
        ]);

        return redirect()->back()->with('success', 'Tenant successfully created.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'tenant_name' => 'required|string|max:255',
            'tenant_description' => 'required|string',
            'tenant_website' => 'nullable|url',
        ]);

        $tenant = Tenant::findOrFail($id);

        $image = $tenant->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = 'tenant_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/img/tenants', $image, 'public');
            if ($tenant->image) {
                Storage::disk('public')->delete('/img/tenants/' . $tenant->image);
            }
        }

        $tenant->update([
            'image' => $image,
            'tenant_name' => $request->tenant_name,
            'tenant_description' => $request->tenant_description,
            'tenant_website' => $request->tenant_website,
        ]);

        return redirect()->back()->with('success', 'Tenant successfully updated.');
    }

    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);

        if ($tenant->image) {
            Storage::disk('public')->delete('/img/tenants/' . $tenant->image);
        }

        $tenant->delete();

        return redirect()->back()->with('success', 'Tenant successfully deleted.');
    }
}

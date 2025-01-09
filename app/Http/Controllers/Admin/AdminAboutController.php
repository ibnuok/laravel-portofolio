<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view ('admin.about.index', compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string',
           
        ]);
        
        $data['description'] = $data['description'] ?? '';

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('about', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.about.index')->with('success', 'About added successfully.');
    }

    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'name' => 'required|string',
            
        ]);

        if ($request->hasFile('file')) {
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('certificate', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificat.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(About $about)
    {
        if ($about->file) {
            Storage::disk('public')->delete($about->file);
        }
        $certificate->delete();

        return redirect()->route('admin.about.index')->with('success', 'About deleted successfully.');
    }
}

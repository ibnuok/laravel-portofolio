<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class AdminCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate = Certificate::all();
        return view ('admin.certificate.index', compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'issued_by' => 'required|string',
            'issued_at' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'nullable',
        ]);
        
        $data['description'] = $data['description'] ?? '';

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('certificate', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.certificate.index')->with('success', 'Certificate added successfully.');
    }

    public function show(Certificate $certificate)
    {
        return view('admin.certificate.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificate.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'issued_by' => 'required|string',
            'issued_at' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }
            $data['file'] = $request->file('file')->store('certificate', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificate.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file) {
            Storage::disk('public')->delete($certificate->file);
        }
        $certificate->delete();

        return redirect()->route('admin.certificate.index')->with('success', 'Certificate deleted successfully.');
    }
}

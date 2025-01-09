<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }
    public function create()
    {
        return view('admin.skills.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Data skill berhasil disimpan!');
    }
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')
                        ->with('success', 'Skill updated successfully.');
    }
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Data Skill berhasil dihapus');
    }
}

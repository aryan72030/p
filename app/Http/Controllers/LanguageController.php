<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('language.index', compact('languages'));
    }

    public function create()
    {
        return view('language.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'language_name' => 'required',
            'language_code' => 'required'
        ]);

        Language::create($request->all());
        return redirect()->route('language.index');
    }

    public function edit(Language $language)
    {
        return view('language.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'language_name' => 'required',
            'language_code' => 'required'
        ]);

        $language->update($request->all());
        return redirect()->route('language.index');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('language.index');
    }

    public function change($code)
    {
        session(['locale' => $code]);
        app()->setLocale($code);
        return redirect()->back();
    }
}

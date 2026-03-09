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
        try {
            if (strtolower($request->language_code) === 'en') {
                return redirect()->route('language.index')->with('error', 'English language already exists by default');
            }
            
            $request->validate([
                'language_name' => 'required|unique:languages,language_name',
                'language_code' => 'required|unique:languages,language_code'
            ], [
                'language_name.unique' => 'Language already exists',
                'language_code.unique' => 'Language code already exists'
            ]);

            Language::create($request->all());
            return redirect()->route('language.index')->with('success', 'Language created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('language.index')->with('error', $e->validator->errors()->first());
        }
    }

    public function edit(Language $language)
    {
        return view('language.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        try {
            $request->validate([
                'language_name' => 'required|unique:languages,language_name,' . $language->id,
                'language_code' => 'required|unique:languages,language_code,' . $language->id
            ], [
                'language_name.unique' => 'Language already exists',
                'language_code.unique' => 'Language code already exists'
            ]);

            $language->update($request->all());
            return redirect()->route('language.index')->with('success', 'Language updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('language.index')->with('error', $e->validator->errors()->first());
        }
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('language.index')->with('success', 'Language deleted successfully');
    }

    public function change($code)
    {
        session(['locale' => $code]);
        app()->setLocale($code);
        return redirect()->back();
    }
}

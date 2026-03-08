<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LanguageTranslationController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('language-translation.index', compact('languages'));
    }

    public function edit($code)
    {
        $language = Language::where('language_code', $code)->firstOrFail();
        $filePath = resource_path("lang/{$code}.json");
        $translations = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];
        
        return view('language-translation.edit', compact('language', 'translations'));
    }

    public function update(Request $request, $code)
    {
        $filePath = resource_path("lang/{$code}.json");
        $translations = $request->input('translations', []);
        
        File::put($filePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        return redirect()->route('language-translation.index');
    }
}

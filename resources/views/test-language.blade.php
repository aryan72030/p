@extends('masterpage.layout')

@section('title')
    Test Language
@endsection

@section('mainConten')
    <div class="container mt-5">
        <h1>Current Locale: {{ app()->getLocale() }}</h1>
        <h2>Session Locale: {{ session('locale', 'not set') }}</h2>
        
        <h3>Test Translations:</h3>
        <p>Dashboard: {{ __('Dashboard') }}</p>
        <p>Home: {{ __('Home') }}</p>
        <p>Language: {{ __('Language') }}</p>
        
        <h3>Available Languages:</h3>
        @foreach(\App\Models\Language::all() as $lang)
            <a href="{{ route('language.change', $lang->language_code) }}" class="btn btn-primary">
                {{ $lang->language_name }} ({{ $lang->language_code }})
            </a>
        @endforeach
    </div>
@endsection

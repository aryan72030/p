@extends('masterpage.layout')

@section('title')
    {{ __('Edit Translations') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Edit Translations') }} - {{ $language->language_name }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('language-translation.index') }}">{{ __('Language Translation') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Edit') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $language->language_name }} ({{ $language->language_code }})</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('language-translation.update', $language->language_code) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="40%">{{ __('Key') }}</th>
                                                <th width="60%">{{ __('Translation') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($translations as $key => $value)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>
                                                        <input type="text" name="translations[{{ $key }}]" value="{{ $value }}" class="form-control">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <a href="{{ route('language-translation.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

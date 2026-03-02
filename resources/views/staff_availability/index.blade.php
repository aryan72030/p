@extends('masterpage.layout')

@section('title', 'Staff Availability')

@section('mainConten')
<div class="dash-container">
    <div class="dash-content">
               <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Basic staff managment Tables') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('staff avaliblity') }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('staffAvailability.store') }}">
                    @csrf
                    
                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                    <div class="mb-3 p-3 border">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="available_{{ $day }}" id="check_{{ $day }}" value="1" 
                                {{ $availability && isset($availability->availability[$day]) ? 'checked' : '' }}>
                            <label class="form-check-label" for="check_{{ $day }}">
                                <strong>{{ $day }}</strong>
                            </label>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Start Time</label>
                                <input type="time" class="form-control" 
                                    name="start_{{ $day }}" 
                                    value="{{ $availability->availability[$day]['start'] ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <label>End Time</label>
                                <input type="time" class="form-control" 
                                    name="end_{{ $day }}" 
                                    value="{{ $availability->availability[$day]['end'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <button type="submit" class="btn btn-primary mt-3">{{ __('Save Availability') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
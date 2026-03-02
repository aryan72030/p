@extends('masterpage.layout')

@section('title')
    {{ __('appointment') }}
@endsection


@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Basic appointment Tables') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Appointment') }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Basic appointment Table') }}</h5>
                            <span
                                class="d-block m-t-5">{{ __('use class ') }}<code>{{ __('table') }}</code>{{ __('inside table
                                                                                                                                                                                                                                                                                                element') }}</span>
                            @permission('create-appointment')
                                <a href="#" class="btn btn-sm btn-primary btn-icon" title="{{ __('Create appointment') }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-ajax-popup="true"
                                    data-title="{{ __('Create appointment') }}" data-url="{{ route('appointment.create') }}"
                                    data-size="lg"><i class="ti ti-plus"></i></a>
                            @endpermission
                         </div>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Service') }}</th>
                                            <th>{{ __('appointment Date') }}</th>
                                            <th>{{ __('start time') }}</th>
                                            <th>{{ __('staff availability') }}</th>
                                            <th>{{__('coustmer name')}}</th>
                                            <th>{{ __('status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->service }}</td>
                                                <td>{{ $appointment->appointment_date }}</td>
                                                <td>{{ $appointment->start_time }}</td>
                                                <td>
                                                        {{ $appointment->staff->name }}
                                                        ({{ $appointment->staff->availability->availability[\Carbon\Carbon::parse($appointment->appointment_date)->format('l')]['start'] }}
                                                        -
                                                        {{ $appointment->staff->availability->availability[\Carbon\Carbon::parse($appointment->appointment_date)->format('l')]['end'] }})
                                                </td>
                                                <td>{{$appointment->users->name}}</td>
                                                <td>
                                           
                                                    <form method="POST"
                                                        action="{{ Route('appointment.update', $appointment->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" @if(!Auth::user()->hasRole('admin')) disabled  @endif class="form-select form-select-sm"
                                                            onchange="this.form.submit()">
                                                            <option value="pending"
                                                                {{ $appointment->status == 'pending' ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="confirmed"
                                                                {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>
                                                                Confirmed</option>
                                                            <option value="cancelled"
                                                                {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>
                                                                Cancelled</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td style="display: flex">
                                                @permission('edit-appointment')
                                                    
                                                        <a href="" class="btn btn-gradient-info" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-ajax-popup="true"
                                                            data-title="{{ __('update appointment') }}"
                                                            data-url="{{ route('appointment.edit', $appointment->id) }}"
                                                            data-size="lg">{{ __('update') }}</a>
                                                    
                                                @endpermission
                                                    
                                                @permission('delete-appointment')
                                                  
                                                        <form action="{{ Route('appointment.destroy', $appointment->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('are you sure')"
                                                                class="btn btn-gradient-danger">{{ __('delete') }}</button>
                                                        </form>  
                                                @endpermission
                                                  </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('masterpage.modal')
@endsection


@extends('masterpage.layout')

@section('title')
    {{ __('calendar') }}
@endsection

@section('mainConten')
<div class="dash-container">
    <div class="dash-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h4 class="m-b-10">Calendar</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">Application</li>
                            <li class="breadcrumb-item">Calendar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            
            <!-- [ sample-page ] start -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Calendar</h5>
                    </div>
                    <div class="card-body">
                        <div id='calendar' class='calendar'></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="btn-group float-end">
                            <button type="button" class="btn dropdown-toggle arrow-none" data-bs-toggle="dropdown">
                                <i class="feather icon-more-vertical text-white"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#!" class="dropdown-item">
                                    <i class="ti ti-settings"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ti ti-headset"></i>
                                    <span>Support</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ti ti-power"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                        <div class="me-1">
                            <h4 class="mb-0 text-white">Productivity</h4>
                            <p class="text-white mb-0"><i class="ti ti-arrow-narrow-up"></i> 4% more in 2021</p>
                        </div>
                    </div>
                    <div id="task-chart"></div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Next events</h4>
                        <ul class="event-cards list-group list-group-flush mt-3 w-100">
                            @php
                                $upcomingAppointments = $appointments->where('appointment_date', '>=', now()->format('Y-m-d'))->sortBy('appointment_date')->take(5);
                                $colors = ['warning', 'info', 'danger', 'success', 'primary'];
                                $icons = ['ti-calendar', 'ti-clock', 'ti-user', 'ti-briefcase', 'ti-star'];
                            @endphp
                            @forelse($upcomingAppointments as $index => $appointment)
                            <li class="list-group-item card mb-3">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mb-3 mb-sm-0">
                                        <div class="d-flex align-items-center">
                                            <div class="theme-avtar bg-{{ $colors[$index % 5] }}">
                                                <i class="ti {{ $icons[$index % 5] }}"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="m-0">{{ $appointment->service }}</h6>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}, at {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}</small>
                                                <small class="d-block text-muted">Staff: {{ $appointment->staff->name ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-{{ $appointment->status == 'Confirmed' ? 'success' : ($appointment->status == 'Pending' ? 'warning' : 'secondary') }}">{{ $appointment->status }}</span>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <li class="list-group-item card mb-0">
                                <p class="text-muted text-center mb-0">No upcoming appointments</p>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


@push('js_calendar') 
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>
    <script>
        var appointmentsData = {!! json_encode($appointments->map(function($appointment) {
            return [
                'title' => $appointment->service . ' - ' . ($appointment->users->name ?? 'N/A'),
                'start' => $appointment->appointment_date . 'T' . $appointment->start_time,
                'className' => $appointment->status == 'Confirmed' ? 'event-success' : ($appointment->status == 'Pending' ? 'event-warning' : 'event-danger'),
                'extendedProps' => [
                    'staff' => $appointment->staff->name ?? 'N/A',
                    'customer' => $appointment->users->name ?? 'N/A',
                    'status' => $appointment->status
                ]
            ];
        })) !!};
    </script>
    <script src="{{ asset('assets/js/calendar.js') }}"></script> 
@endpush 


@include('masterpage.modal')

<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModalLabel">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="appointmentDetails"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('masterpage.layout')

@section('title')
    {{ __('Dashboard') }}
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
                            <h4 class="m-b-10"> {{__('General Statistics')}}</h4>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item"> {{__('General Statistics')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xxl-7">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-primary">
                                            <i class="ti ti-home"></i>
                                        </div>
                                        <p class="text-muted text-sm mt-4 mb-2">{{__('Statistics')}}</p>
                                        <h6 class="mb-3">{{ __('Appointment') }}</h6>
                                        <h3 class="mb-0">{{$appointmet_count}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-info">
                                            <i class="ti ti-click"></i>
                                        </div>
                                        <p class="text-muted text-sm mt-4 mb-2">{{__('Statistics')}}</p>
                                        <h6 class="mb-3">New Users</h6>
                                        <h3 class="mb-0">744 <span class="text-danger text-sm"><i
                                                    class="ti ti-arrow-narrow-down"></i> +55%</span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-warning">
                                            <i class="ti ti-report-money"></i>
                                        </div>
                                        <p class="text-muted text-sm mt-4 mb-2">{{__('Statistics')}}</p>
                                        <h6 class="mb-3">Sessions</h6>
                                        <h3 class="mb-0">1,414 <span class="text-success text-sm"><i
                                                    class="ti ti-arrow-narrow-up"></i> +55%</span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="theme-avtar bg-danger">
                                            <i class="ti ti-thumb-up"></i>
                                        </div>
                                        <p class="text-muted text-sm mt-4 mb-2">{{__('Statistics')}}</p>
                                        <h6 class="mb-3">Page/Sessions</h6>
                                        <h3 class="mb-0">1.76 <span class="text-danger text-sm"><i
                                                    class="ti ti-arrow-narrow-down"></i> +55%</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5>Sales by Country</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/images/pages/flag.svg" class="wid-25"
                                                            alt="images">
                                                        <div class="ms-3">
                                                            <small class="text-muted">Country:</small>
                                                            <h6 class="m-0">United States</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Sales:</small>
                                                    <h6 class="m-0">2500</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Value:</small>
                                                    <h6 class="m-0">$230,900</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Bounce:</small>
                                                    <h6 class="m-0">29.9%</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/images/pages/flag.svg" class="wid-25"
                                                            alt="images">
                                                        <div class="ms-3">
                                                            <small class="text-muted">Country:</small>
                                                            <h6 class="m-0">United States</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Sales:</small>
                                                    <h6 class="m-0">2500</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Value:</small>
                                                    <h6 class="m-0">$230,900</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Bounce:</small>
                                                    <h6 class="m-0">29.9%</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/images/pages/flag.svg" class="wid-25"
                                                            alt="images">
                                                        <div class="ms-3">
                                                            <small class="text-muted">Country:</small>
                                                            <h6 class="m-0">United States</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Sales:</small>
                                                    <h6 class="m-0">2500</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Value:</small>
                                                    <h6 class="m-0">$230,900</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Bounce:</small>
                                                    <h6 class="m-0">29.9%</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/images/pages/flag.svg" class="wid-25"
                                                            alt="images">
                                                        <div class="ms-3">
                                                            <small class="text-muted">Country:</small>
                                                            <h6 class="m-0">United States</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Sales:</small>
                                                    <h6 class="m-0">2500</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Value:</small>
                                                    <h6 class="m-0">$230,900</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Bounce:</small>
                                                    <h6 class="m-0">29.9%</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/images/pages/flag.svg" class="wid-25"
                                                            alt="images">
                                                        <div class="ms-3">
                                                            <small class="text-muted">Country:</small>
                                                            <h6 class="m-0">United States</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Sales:</small>
                                                    <h6 class="m-0">2500</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Value:</small>
                                                    <h6 class="m-0">$230,900</h6>
                                                </td>
                                                <td>
                                                    <small class="text-muted">Bounce:</small>
                                                    <h6 class="m-0">29.9%</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="float-end">
                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Refferals"><i
                                    class="ti ti-info-circle"></i></a>
                        </div>
                        <h5>Refferals</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div id="projects-chart"></div>
                            </div>
                            <div class="col-6">
                             
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <span class="d-flex align-items-center mb-2">
                                            <i class="f-10 lh-1 fas fa-circle text-danger"></i>
                                            <span class="ms-2 text-sm text-danger">cancelled</span>
                                        </span>
                                    </div>

                                    <div class="col-6">
                                        <span class="d-flex align-items-center mb-2">
                                            <i class="f-10 lh-1 fas fa-circle text-warning"></i>
                                            <span class="ms-2 text-sm text-info">confirmed</span>
                                        </span>
                                    </div>

                                    <div class="col-6">
                                        <span class="d-flex align-items-center mb-2">
                                            <i class="f-10 lh-1 fas fa-circle text-info"></i>
                                            <span class="ms-2 text-sm text-warning">pending</span>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xxl-5">
                        <div class="card">
                            <div class="card-header">
                                <h5>Traffic channels</h5>
                            </div>
                            <div class="card-body">
                                <div id="traffic-chart"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="bg-primary rounded p-3">
                                    <div id="user-chart"></div>
                                </div>
                                <h4 class="mt-4 mb-0">Active Users</h4>
                                <span class="text-sm text-muted">(+23%) than last week</span>
                                <div class="row mt-4">

                                    <div class="col-md-3 col-6 my-2">
                                        <div class="d-flex align-items-start">
                                            <div class="theme-avtar bg-primary">
                                                <i class="ti ti-home"></i>
                                            </div>
                                            <div class="ms-2">
                                                <p class="text-muted text-sm mb-0">cancelled stutas</p>
                                                <h4 class="mb-0 text-primary">3M</h4>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-primary" style="width: 58%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 my-2">
                                        <div class="d-flex align-items-start">
                                            <div class="theme-avtar bg-info">
                                                <i class="ti ti-home"></i>
                                            </div>
                                            <div class="ms-2">
                                                <p class="text-muted text-sm mb-0">confirmed stutas</p>
                                                <h4 class="mb-0 text-info">55</h4>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-info" style="width: 78%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 my-2">
                                        <div class="d-flex align-items-start">
                                            <div class="theme-avtar bg-warning">
                                                <i class="ti ti-home"></i>
                                            </div>
                                            <div class="ms-2">
                                                <p class="text-muted text-sm mb-0">pending stutas</p>
                                                <h4 class="mb-0 text-warning">3</h4>
                                                <div class="progress mb-0">
                                                    <div class="progress-bar bg-warning" style="width: 40%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection

@push('js_required')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js')}}"></script>
   
<script>
    var pending = {{ $pending }};
    var confirmed = {{ $confirmed }};
    var cancelled = {{ $cancelled }};
</script>

    <script src="{{ asset('assets/js/apex.js')}}"></script>
@endpush

<script>

 
</script>
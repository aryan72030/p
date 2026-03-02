@extends('masterpage.layout')

@section('title')
    {{ __('Create Plan') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Create Plan') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">{{ __('Plans') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Create') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Plan Details') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('plan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter plan title" required>
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label" for="exampleTextarea">{{ __('Description') }}</label>
                                        <textarea class="form-control" name="description" placeholder="Enert description" rows="3" required></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label">{{ __('plan-type') }}</label>
                                        <div>
                                            <input type="radio" name="plan_type" value="Free" id="Free" checked>
                                            <label for="Free">Free</label>
                                            <input type="radio" name="plan_type" value="Paid" id="Paid"
                                                class="ms-3">
                                            <label for="Paid">Paid</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" id="toggledDiv">
                                        <label class="form-label">{{ __('amount') }}</label>
                                        <input type="number" name="amount" class="form-control"
                                            placeholder="Enter plan amount">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label">{{ __('duration') }}</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="duration" id="select" required>
                                                <option value="">select duration</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Quartely">Quartely</option>
                                                <option value="Half_year">Half Year</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                        </div>        
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label">{{ __('Max service') }}</label>
                                        <input type="number" name="max_service" class="form-control"
                                            placeholder="Enter max service" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label">{{ __('Max Employees') }}</label>
                                        <input type="number" name="max_employees" class="form-control"
                                            placeholder="Enter max employees" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                <a href="{{ route('plan.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const showRadio = document.getElementById('Paid');
        const hideRadio = document.getElementById('Free');
        const toggledDiv = document.getElementById('toggledDiv');

        function handleRadioChange() {
            if (showRadio.checked) {
                toggledDiv.style.display = 'block';
            } else {
                toggledDiv.style.display = 'none';
            }
        }
        
        showRadio.addEventListener('change', handleRadioChange);
        hideRadio.addEventListener('change', handleRadioChange);

        handleRadioChange();
    });
</script>

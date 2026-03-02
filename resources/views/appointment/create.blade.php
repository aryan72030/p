<form class="validate-me" action="{{ Route('appointment.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        @if(isset($customers))
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Customer') }}</label>
        <div class="col-lg-6">
            <select class="form-control" name="customer_id" required>
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
    
    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Service') }}</label>
        <div class="col-lg-6">
            <select class="form-control" name="service" id="select" required>
                <option>select service</option>
                @foreach ($service as $service)
                    <option value="{{ $service->name }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        @error('service')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Appointment Date') }}</label>
        <div class="col-lg-6">
            <input type="date" id="appointment_date" class="form-control" value="" name="appointment_date">
            @error('appointment_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Start Time') }}</label>
        <div class="col-lg-6">
            <input type="time" class="form-control" value="" name="start_time">
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group row">

        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Staff Availability') }}</label>
        <div class="col-lg-6">
            <select name="staff_id" id="staff_id" class="form-control" required>
                <option value="">{{ __('Select Date First') }}</option>
            </select>
            <small class="text-muted" id="availability-info"></small>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4 col-form-label"></div>
        <div class="col-lg-6">
            <input type="submit" name="save" class="btn btn-primary" value="Submit">
        </div>
    </div>

</form>

<script>
    const staff = @json($staff);

    document.getElementById('appointment_date').addEventListener('change', function() {

        if (!this.value) return;

        const date = new Date(this.value + 'T00:00:00');
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const day = days[date.getDay()];
     

        const select = document.getElementById('staff_id');
        const info = document.getElementById('availability-info');

        select.innerHTML = '<option value="">Select Staff</option>';
        info.textContent = '';

        staff.forEach(s => {
            const avail = s.availability?.availability?.[day];
            if (avail) {
                const opt = new Option(
                    s.name + ' (' + avail.start + ' - ' + avail.end + ')',
                    s.id
                );
                opt.dataset.start = avail.start;
                opt.dataset.end = avail.end;
                select.add(opt);
            }
        });

        if (select.options.length === 1) {
            info.textContent = 'No staff available on ' + day;
        }
    });

    document.getElementById('staff_id').addEventListener('change', function() {
        const opt = this.options[this.selectedIndex];
        const info = document.getElementById('availability-info');

        if (opt.dataset.start) {
            info.textContent = 'Available: ' + opt.dataset.start + ' - ' + opt.dataset.end;
        } else {
            info.textContent = '';
        }
    });
</script>

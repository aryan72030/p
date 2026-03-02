<form class="validate-me" action="{{ Route('appointment.update', $appointment->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Service') }}</label>
        <div class="col-lg-6">
            <select class="form-control" name="service" id="select" required>
                <option>select service</option>
                @foreach ($service as $service)
                    <option value="{{ $service->name }}"{{ $service->name == $appointment->service ? 'selected' : '' }}>
                        {{ $service->name }}</option>
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
            <input type="date" id="appointment_date" class="form-control"
                value="{{ $appointment->appointment_date }}" name="appointment_date">
            @error('appointment_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Start Time') }}</label>
        <div class="col-lg-6">
            <input type="time" class="form-control" value="{{ $appointment->start_time }}" name="start_time">
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Staff Availability') }}</label>
        <div class="col-lg-6">
            <select name="staff_id" id="staff_id" class="form-control" required
                data-current-staff-id="{{ $appointment->staff_id }}">
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
    $(document).on('shown.bs.modal', '#commonModal', function() {
        const modal = $(this);

        const staff = @json($staff);
        const currentStaffId = modal.find('#staff_id').data('current-staff-id');

        function loadStaffByDate(dateValue) {
            if (!dateValue) return;

            const date = new Date(dateValue + 'T00:00:00');
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const day = days[date.getDay()];

            const select = modal.find('#staff_id')[0];
            const info = modal.find('#availability-info')[0];

            select.innerHTML = '<option value="">{{ __('Select Staff') }}</option>';
            info.textContent = '';

            staff.forEach(s => {
                const avail = s.availability?.availability?.[day];
                if (avail) {
                    const opt = new Option(`${s.name} (${avail.start} - ${avail.end})`, s.id);
                    opt.dataset.start = avail.start;
                    opt.dataset.end = avail.end;

                    if (currentStaffId && s.id == currentStaffId) {
                        opt.selected = true;
                        info.textContent = `Available: ${avail.start} - ${avail.end}`;
                    }

                    select.add(opt);
                }
            });

            if (select.options.length === 1) {
                info.textContent = 'No staff available on ' + day;
            }
        }

        modal.find('#appointment_date').off('change').on('change', function() {
            loadStaffByDate(this.value);
        });

        modal.find('#staff_id').off('change').on('change', function() {
            const opt = this.options[this.selectedIndex];
            const info = modal.find('#availability-info')[0];
            if (opt.dataset.start) {
                info.textContent = `Available: ${opt.dataset.start} - ${opt.dataset.end}`;
            } else {
                info.textContent = '';
            }
        });
        const dateInput = modal.find('#appointment_date').val();
        if (dateInput) loadStaffByDate(dateInput);
    });
</script>

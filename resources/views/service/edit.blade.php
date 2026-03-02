<form action="{{ Route('service.update', $service_upd->id) }}" id="data" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">{{ __('Enter name') }}</label>
            <input type="text" name="name" value="{{ $service_upd->name }}" class="form-control"
                placeholder="Enter title" required>
        </div>

        <div class="form-group">
            <label class="form-label">{{ __('Enter Price') }} </label>
            <input type="number" name="price" class="form-control" placeholder="Enter price"
                value="{{ $service_upd->price }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">{{ __('Enter duration') }}
            </label>
            <input type="number" name="duration" class="form-control" placeholder="Enter duration"
                value="{{ $service_upd->duration }}" required>
        </div>

        <div class="form-group row">
            <label class="col-3 col-form-label">{{ __('status') }}</label>
            <div class="col-9">
                <div class="">
                    <input class="" name="status" type="radio"
                        value="Active"{{ $service_upd->status == 'Active' ? 'checked' : '' }} id="defaultCheck1">
                    <label class="" for="defaultCheck1">
                        Active
                    </label>
                </div>
                <div class="">
                    <input class="" name="status" type="radio"
                        value="InActive"{{ $service_upd->status == 'InActive' ? 'checked' : '' }} id="defaultCheck2">
                    <label class="" for="defaultCheck2">
                        InActive
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group mb-0">
            <label class="form-label" for="exampleTextarea">{{ __('Description') }}</label>
            <textarea class="form-control" name="description" placeholder="Enter description" rows="3" required>{{ $service_upd->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="demo-input-file" class="col-form-label">{{ _('image') }}</label>
            <input class="form-control" type="file" name="image" id="demo-input-file">
        </div>

    </div>
    <button type="submit" id="save" class="btn  btn-primary">{{ __('Save') }}
    </button>
</form>


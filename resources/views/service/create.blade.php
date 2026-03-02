<form class="validate-me" action="{{ Route('service.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label">{{ __('Enter name') }}</label>
        <input type="text" name="name" value="" class="form-control" placeholder="Enter name" required>
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Enter Price') }} </label>
        <input type="number" name="price" class="form-control" placeholder="Enter price" value="" required>
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Enter duration') }}
        </label>
        <input type="number" name="duration" class="form-control" placeholder="Enter duration" value="" required>
    </div>

    <div class="form-group row">
        <label class="col-3 col-form-label">{{ __('status') }}</label>
        <div class="col-9">
            <div class="">
                <input class="" name="status" type="radio" value="Active" id="defaultCheck1">
                <label class="" for="defaultCheck1">
                    Active
                </label>
            </div>
            <div class="">
                <input class="" name="status" type="radio" value="InActive" id="defaultCheck2">
                <label class="" for="defaultCheck2">
                    InActive
                </label>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <label class="form-label" for="exampleTextarea">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" placeholder="Enert description" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="demo-input-file" class="col-form-label">{{ _('image') }}</label>
        <input class="form-control" type="file" name="image" id="demo-input-file">
    </div>

    <button type="submit" id="save" class="btn  btn-primary">{{ __('Save') }}
    </button>

</form>

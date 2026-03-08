<form action="{{ Route('language.update', $language->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label class="form-label">{{ __('Language Name') }}</label>
        <input type="text" name="language_name" value="{{ $language->language_name }}" class="form-control" placeholder="Enter language name" required>
    </div>

    <div class="form-group">
        <label class="form-label">{{ __('Language Code') }}</label>
        <input type="text" name="language_code" value="{{ $language->language_code }}" class="form-control" placeholder="Enter language code" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
</form>

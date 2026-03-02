  <div class="pct-customizer">
        <div class="pct-c-btn">
            <button class="btn btn-primary" id="pct-toggler">
                <i data-feather="settings"></i>
            </button>
        </div>
        <div class="pct-c-content">
            <div class="pct-header bg-primary">
                <h5 class="mb-0 text-white f-w-500">{{__('Theme Customizer')}}</h5>
            </div>
            <div class="pct-body">
                <h6 class="mt-2">
                    <i data-feather="credit-card" class="me-2"></i>{{ __('Primary color settings') }}
                </h6>
                <hr class="my-2" />
                <div class="theme-color themes-color">
                    <a href="#!" class="" data-value="theme-1"></a>
                    <a href="#!" class="" data-value="theme-2"></a>
                    <a href="#!" class="" data-value="theme-3"></a>
                    <a href="#!" class="" data-value="theme-4"></a>
                    <a href="#!" class="" data-value="theme-5"></a>
                    <a href="#!" class="" data-value="theme-6"></a>
                    <a href="#!" class="" data-value="theme-7"></a>
                    <a href="#!" class="" data-value="theme-8"></a>
                    <a href="#!" class="" data-value="theme-9"></a>
                    <a href="#!" class="" data-value="theme-10"></a>
                </div>
                <h6 class="mt-4 rtl-hide">
                    <i data-feather="layout" class="me-2"></i>{{ __('Sidebar settings') }}
                </h6>
                <hr class="my-2 rtl-hide" />
                <div class="form-check form-switch rtl-hide">
                    <input type="checkbox" class="form-check-input" id="cust-theme-bg" checked />
                    <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg">{{ __('Transparent layout')}}</label>
                </div>
                <h6 class="mt-4 rtl-hide">
                    <i data-feather="sun" class="me-2"></i>{{ __('Layout settings') }}
                </h6>
                <hr class="my-2 rtl-hide" />
                <div class="form-check form-switch mt-2 rtl-hide">
                    <input type="checkbox" class="form-check-input" id="cust-darklayout" />
                    <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">{{__('Dark Layout')}}</label>
                </div>
                <h6 class="mt-4">
                    <i data-feather="layout" class="me-2"></i>{{ __('Right To Left') }}
                </h6>
                <hr class="my-2" />
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="cust-rtllayout" />
                    <label class="form-check-label f-w-600 pl-1" for="cust-rtllayout">{{__('RTL layout')}}</label>
                </div>
            </div>
        </div>
    </div>
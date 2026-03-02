    <header class="dash-header transprent-bg">
        <div class="header-wrapper">
            <div class="me-auto dash-mob-drp">
                <ul class="list-unstyled">
                    <li class="dash-h-item mob-hamburger">
                        <a href="#!" class="dash-head-link" id="mobile-collapse">
                            <div class="hamburger hamburger--arrowturn">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown dash-h-item">
                        <a class="dash-head-link dropdown-toggle arrow-none ms-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <i data-feather="search"></i>
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Search here. . ." />
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="dropdown dash-h-item drp-company">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="theme-avtar">c</span>
                            <span class="hide-mob ms-2">{{__('Company')}}</span>
                            <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown">
                            <a href="#!" class="dropdown-item">
                                <i class="ti ti-checks text-success"></i>
                                <span>{{ Auth::user()->name }}</span>
                                <span class="badge bg-dark">{{__('owner')}}</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <span>{{ Auth::user()->name }}</span>
                                <span class="badge bg-dark">{{__('owner')}}</span>
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="#!" class="dropdown-item">
                                <i class="ti ti-circle-plus"></i>
                                <span>{{__('Create New')}}</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ti ti-circle-x"></i>
                                <span>{{__('Remove')}}</span>
                            </a>
                            <hr class="dropdown-divider" />
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <span>{{__('Profile')}}</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ti ti-message"></i>
                                <span>{{__('Message')}}</span>
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                this.closest('form').submit();">
                                    <i class="ti ti-power"></i>
                                    <span>{{__('Logout')}}</span>
                                </a>
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">

                    <li class="dash-h-item">
                        <a class="dash-head-link me-0" href="#" data-bs-toggle="modal"
                            data-bs-target="#notification-modal">
                            <i class="ti ti-message-2"></i>
                            <span class="bg-danger dash-h-badge dots"><span class="sr-only"></span></span>
                        </a>
                    </li>
                    <li class="dropdown dash-h-item drp-notification">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-bell"></i>
                            <span class="bg-danger dash-h-badge dots"><span class="sr-only"></span></span>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            <div class="noti-header">
                                <h5 class="m-0">{{__('Notification')}}</h5>
                                <a href="#" class="dash-head-link">{{__('Clear All')}}</a>
                            </div>
                            <div class="noti-body">
                                <h6 class="text-muted">{{__('Today')}}</h6>
                                <hr class="dropdown-divider" />
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-device-desktop"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Allow desktop notification')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">
                                                {{ __('you get lettest content at a time when data will updated') }}
                                            </p>
                                            <span class="text-sm ms-2 text-nowrap">{{__('1 min ago')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-success">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Admin settings')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">{{__('Setup complete')}}</p>
                                            <span class="text-sm ms-2 text-nowrap">{{__('5 hour ago')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted">{{__('Yesterday')}}</h6>
                                <hr class="dropdown-divider" />
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-mail"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Mailbox')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">
                                               {{ __(' you have 15 unread mails across 3 mailboxes.') }}
                                            </p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 6:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-danger">
                                        <i class="ti ti-alert-triangle"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Report fail')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">{{__('Setup complete')}}</p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 9:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-success">
                                        <i class="ti ti-shopping-cart"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Order received')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">{{__('New order received.')}}</p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 10:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-light-primary">
                                        <i class="ti ti-mail text-primary"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Mailbox')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">
                                                {{ __('you have 15 unread mails across 3 mailboxes.') }}
                                            </p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 6:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-light-danger">
                                        <i class="ti ti-alert-triangle text-danger"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Report fail')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">{{__('Setup complete')}}</p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 9:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start my-4">
                                    <div class="theme-avtar bg-light-success">
                                        <i class="ti ti-shopping-cart text-success"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <a href="#">
                                                <h6>{{__('Order received')}}</h6>
                                            </a>
                                            <a href="#" class="text-hover-danger"><i class="ti ti-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between">
                                            <p class="mb-0 text-muted">{{__('New order received.')}}</p>
                                            <span class="text-sm ms-2 text-nowrap">Apr 6, 10:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="noti-footer">
                                <div class="d-grid">
                                    <a href="#"
                            class="btn dash-head-link justify-content-center text-primary mx-0">{{__('View all')}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dash-h-item drp-language">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-world nocolor"></i>
                            <span class="drp-text hide-mob">EN</span>
                            <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            <a href="#!" class="dropdown-item">
                                <span>{{__('English')}}</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <span>{{__('Deutsch')}}</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h6 class="mt-2">
                        <i data-feather="monitor" class="me-2"></i>{{ __('Desktop settings') }}
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting1" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting1">{{__('Allow desktop
                            notification')}}</label>
                    </div>
                    <p class="text-muted ms-5">
                        {{ __('you get lettest content at a time when data will updated') }}
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting2" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting2">{{__('Store Cookie')}}</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="save" class="me-2"></i>{{ __('Application settings') }}
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting3" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting3">{{__('Backup Storage')}}</label>
                    </div>
                    <p class="text-muted mb-4 ms-5">
                       {{ __(' Automaticaly take backup as par schedule') }}
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting4" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting4">{{__('Allow guest to print
                            file')}}</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="cpu" class="me-2"></i>{{ __('System settings') }}
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting5" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting5">{{__('View other user chat')}}</label>
                    </div>
                    <p class="text-muted ms-5">{{__('Allow to show public user message')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger btn-sm" data-bs-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="button" class="btn btn-light-primary btn-sm">
                        {{ __('Save changes') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

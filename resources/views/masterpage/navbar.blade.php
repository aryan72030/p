 <nav class="dash-sidebar light-sidebar transprent-bg">
     <div class="navbar-wrapper">
         <div class="m-header">
             <a href="index.html" class="b-brand">
                 <!-- ========   change your logo hear   ============ -->
                 <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="logo logo-lg" />
                 <img src="{{ asset('assets/images/logo-dark.svg') }}" alt="" class="logo logo-sm" />
             </a>
         </div>
         <div class="navbar-content">
             <ul class="dash-navbar">
                 <li class="dash-item dash-hasmenu">
                     <a href="{{ Route('dashboard') }}" class="dash-link"><span class="dash-micon"><i
                                 class="ti ti-home"></i></span><span class="dash-mtext">{{ __('Dashboard') }}</span>
                     </a>
                 </li>
                 <li class="dash-item dash-caption">
                     <label>{{ __('PAGES') }}</label>
                 </li>

                 @permission('manage-plan-subscription')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ url('plan-subscription') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span
                                 class="dash-mtext">{{ __('plan-subscription') }}</span>
                         </a>
                     </li>
                 @endpermission

                 @permission('manage-employees')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('employes.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span class="dash-mtext">{{ __('employees') }}</span>
                         </a>
                     </li>
                 @endpermission
                 @permission('manage-blog')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('blog.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span class="dash-mtext">{{ __('Blog') }}</span>
                         </a>
                     </li>
                 @endpermission
                 @permission('manage-roles')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('role.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span class="dash-mtext">{{ __('Roles') }}</span>
                         </a>
                     </li>
                 @endpermission
                 @permission('manage-service')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('service.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span class="dash-mtext">{{ __('service') }}</span>
                         </a>
                     </li>
                 @endpermission
                 @permission('manage-staff')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('staffAvailability.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span
                                 class="dash-mtext">{{ __('staff availability') }}</span>
                         </a>
                     </li>
                 @endpermission

                 {{-- @permission('manage-appointment')
                     <li class="dash-item dash-hasmenu">
                         <a href="{{ Route('appointment.index') }}" class="dash-link"><span class="dash-micon"><i
                                     class="ti ti-license"></i></span><span
                                 class="dash-mtext">{{ __('Appointment') }}</span>
                         </a>
                     </li>
                 @endpermission --}}

                 <li class="dash-item dash-hasmenu">
                     <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span
                             class="dash-mtext">Appointment</span><span class="dash-arrow"><i
                                 data-feather="chevron-right"></i></span></a>
                     <ul class="dash-submenu">

                         <li class="dash-item">
                             <a class="dash-link" href="{{ Route('appointment.index') }}">{{ __('Appointment') }}</a>
                         </li>

                         <li class="dash-item">
                             <a class="dash-link" href="{{ Route('appointment.calendar') }}">calendar</a>
                         </li>

                     </ul>
                 </li>


                 @permission('manage-setting')
                     <li class="dash-item dash-hasmenu">
                         <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span
                                 class="dash-mtext">setting</span><span class="dash-arrow"><i
                                     data-feather="chevron-right"></i></span></a>
                         <ul class="dash-submenu">
                             @permission('manage-email-setting')
                                 <li class="dash-item">
                                     <a class="dash-link" href="{{ Route('email.create') }}">{{ __('email setting') }}</a>
                                 </li>
                             @endpermission
                             @permission('manage-stripe-setting')
                                 <li class="dash-item">
                                     <a class="dash-link" href="{{ Route('stripe.create') }}">stripe setting</a>
                                 </li>
                             @endpermission
                         </ul>
                     </li>
                 @endpermission


                 @permission('manage-sub-manu-plan')
                     <li class="dash-item dash-hasmenu">
                         <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span
                                 class="dash-mtext">Plans</span><span class="dash-arrow"><i
                                     data-feather="chevron-right"></i></span></a>
                         <ul class="dash-submenu">
                             @permission('manage-plan')
                                 <li class="dash-item">
                                     <a class="dash-link" href="{{ Route('plan.index') }}">Plan</a>
                                 </li>
                             @endpermission
                             @permission('manage-history')
                                 <li class="dash-item">
                                     <a class="dash-link" href="{{ Route('history.index') }}">histroy</a>
                                 </li>
                             @endpermission
                         </ul>
                     </li>
                 @endpermission
             </ul>

         </div>
     </div>
 </nav>

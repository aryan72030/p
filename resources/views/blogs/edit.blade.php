 @extends('masterpage.layout')

 @section('title')
     {{ __('blogs') }}
 @endsection

 @section('mainConten')
  <section id="price" class="price-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6">
            <div
              class="card price-card price-1 wow animate__fadeInUp"
              data-wow-delay="0.2s"
              style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
            >
              <div class="card-body">
                <span class="price-badge bg-primary">STARTER</span>
                <span class="mb-4 f-w-600 p-price"
                  >$59<small class="text-sm">/month</small></span
                >
                <p class="mb-0">
                  You have Free Unlimited Updates and <br />
                  Premium Support on each package.
                </p>
                <ul class="list-unstyled my-5">
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    2 team members
                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    20GB Cloud storage
                  </li>
                  <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                    ></span>
                    Integration help
                  </li>
                </ul>
                <div class="d-grid text-center">
                  <button
                    class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5"
                  >
                    Start with Standard plan
                    <i class="ti ti-chevron-right ms-2"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </section>
 @endsection

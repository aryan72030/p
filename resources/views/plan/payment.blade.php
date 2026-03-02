@extends('masterpage.layout')

@section('title')
    {{ __('Payment') }}
@endsection

@section('mainConten')

    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Payment') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Complete Payment') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h4>{{ $plan->name }}</h4>
                                <p>{{ $plan->description }}</p>
                                <h3>${{ number_format($plan->amount, 2) }}</h3>
                                <p class="text-muted">{{ ucfirst(str_replace('_', ' ', $plan->duration)) }}</p>
                            </div>

                            <form action="{{ Route('plan.payment',$plan->id) }}" method="POST" id="payment-form">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Card Details') }}</label>
                                    <div id="card-element" class="form-control"></div>
                                    <div id="card-errors" class="text-danger mt-2"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit-button">{{ __('Pay Now') }}</button>
                                <a href="{{ url('plan-subscription') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <script src="https://js.stripe.com/clover/stripe.js"></script>
    <script>
      const stripe = Stripe('{{ $stripeKey }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        cardElement.on('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            
            const {token, error} = await stripe.createToken(cardElement);
            
            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
@endsection

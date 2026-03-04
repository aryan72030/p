<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\planPurchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class UserPlanController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->isAbleTo('manage-plan-subscription')) {
            abort(403, 'Unauthorized');
        }
        $duration = $request->get('duration', 'Monthly');
        $plans = Plan::where('duration', $duration)->get();

        $currentPlan = Auth::user()->plan;

        return view('plan.plan-subscription', compact('plans', 'currentPlan', 'duration'));
    }
    public function subscribe(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);

        if ($plan->plan_type == 'Free') {
            $this->create_subcription($plan, null, 'Free', 'Free');
            return redirect()->route('subscription.index')->with('success', 'Free plan subscribed successfully');
        }

        stripe_config();
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $plan->title,
                            'description' => $plan->description,
                        ],
                        'unit_amount' => $plan->amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}&plan_id=' . $plan->id,
                'cancel_url' => route('subscription.index'),
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->get('session_id');
        $planId = $request->get('plan_id');

        if (!$sessionId || !$planId) {
            return redirect()->route('subscription.index')->with('error', 'Invalid payment session');
        }

        stripe_config();
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            
            if ($session->payment_status === 'paid') {
                $plan = Plan::findOrFail($planId);
                $this->create_subcription($plan, $session->payment_intent, 'stripe', $session->id);
                return redirect()->route('subscription.index')->with('success', 'Plan subscribed successfully');
            }

            return redirect()->route('subscription.index')->with('error', 'Payment not completed');
        } catch (\Exception $e) {
            return redirect()->route('subscription.index')->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }

    public function create_subcription($plan, $transactionId, $paymentMethod, $invoice)
    {
        $user=createid();

        $startDate = Carbon::now();
        planPurchase::where('user_id', $user)
            ->where('status', 'active')
            ->update([
                'status' => 'expired',
                'end_date' => Carbon::now()
            ]);

        $endDate = match ($plan->duration) {
            'Monthly' => $startDate->copy()->addDay(23),
            'Quartely' => $startDate->copy()->addMonths(3),
            'Half_year' => $startDate->copy()->addMonths(6),
            'Yearly' => $startDate->copy()->addYear(),
        };

        planPurchase::create([
            'user_id' => $user,
            'plan_id' => $plan->id,
            'amount' => $plan->amount ?? 0,
            'duration' => $plan->duration,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'payment_method' => $paymentMethod,
            'transaction_id' => $transactionId,
            'invoice' => $invoice,
            'status' => 'active',
        ]);

        User::where('id', $user)->update([
            'plan_id' => $plan->id,
            'plan_expiry_date' => $endDate,
        ]);
    }
}

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
        $stripeKey = config('services.stripe.key');

        return view('plan.payment', compact('plan', 'stripeKey'));
    }

    public function payment(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        // $user = Auth::user();

        stripe_config();
        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $charge = \Stripe\Charge::create([
                'amount' => $plan->amount * 100,
                'currency' =>  'usd',
                'source' => $request->stripeToken,
                'description' => 'Plan Subscription: ' . $plan->title,
            ]);

            $this->create_subcription($plan, $charge->id, 'stripe', $charge->receipt_url);

            return redirect()->route('subscription.index')->with('success', 'Plan subscribed successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
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

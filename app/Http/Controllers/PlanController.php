<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\planPurchase;
use App\Models\PlanSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAbleTo('manage-plan')) {
            abort(403, 'Unauthorized');
        }
        $plan = Plan::get();
        return view('plan.index', compact('plan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->isAbleTo('create-plan')) {
            abort(403, 'Unauthorized');
        }
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAbleTo('create-plan')) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'plan_type' => 'required',
            'duration' => 'required',
            'max_service' => 'required',
            'max_employees' => 'required',
        ]);

        $plan = [
            'title' => $request->title,
            'description' => $request->description,
            'plan_type' => $request->plan_type,
            'duration' => $request->duration,
            'amount' => $request->amount ?? null,
            'max_service' => $request->max_service,
            'max_employees' => $request->max_employees,
        ];

        Plan::create($plan);
        return redirect()->route('plan.index')->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->isAbleTo('edit-plan')) {
            abort(403, 'Unauthorized');
        }
        $plan_upd = Plan::where('id', $id)->first();
        return view('plan.edit', compact('plan_upd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'plan_type' => 'required',
            'duration' => 'required',
            'max_service' => 'required',
            'max_employees' => 'required',
        ]);

        $plan = [
            'title' => $request->title,
            'description' => $request->description,
            'plan_type' => $request->plan_type,
            'duration' => $request->duration,
            'amount' => $request->amount ?? null,
            'max_service' => $request->max_service,
            'max_employees' => $request->max_employees,
        ];

        Plan::where('id', $id)->update($plan);
        return redirect()->route('plan.index')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->isAbleTo('delete-plan')) {
            abort(403, 'Unauthorized');
        }
        $plan = Plan::findOrFail($id);

        $plan_id = planPurchase::where('status', 'active')->first();

        if ($plan->id == $plan_id->plan_id) {
            return redirect()->route('plan.index')->with('error', 'Cannot delete plan with active subscriptions');
        }

        $plan->delete();
        return redirect()->back()->with('success', 'deleted successfully');
    }
}

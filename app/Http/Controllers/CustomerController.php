<?php

namespace App\Http\Controllers;

use App\Classes\ActivityLog;
use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer.index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'city',
        ]);

        if ($created = Customer::create($data)) {
            $this->saveLog(Auth::id(), 'created a new customer', 'admin');
            return redirect()->route('customer.index')->withFlash('Customer has been successfully created.', 'success', true);
        }
        return back()->withInput()->withFlash('Error creating customer.', 'danger', true);
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->saveLog(Auth::id(), 'has updated the customer', 'admin', $request->all(), $customer->toArray());

        $updated = $customer->update(
            $request->only(['first_name', 'last_name', 'phone', 'email', 'city'])
        );

        if ($updated) {
            return redirect()->route('customer.index')->withFlash('Customer has been successfully updated.', 'success', true);
        }
        return back()->withInput()->withFlash('Error update customer.', 'danger', true);
    }

    public function destroy(Customer $customer)
    {
        $deleted = $customer->delete();

        if ($deleted) {
            $this->saveLog(Auth::id(), 'removed customer', 'admin');
            return back()->withFlash('Customer has been successfully deleted.', 'success', true);
        }
    }

    public function saveLog(int $editor_id, string $action, string $changed_by, array $old_changes = null, array $new_changes = null)
    {
        $activityLog = new ActivityLog();
        $activityLog->createActionLog($editor_id, $action, $changed_by, $old_changes, $new_changes);
    }
}

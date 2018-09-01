<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CreateCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;

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

        if (Customer::create($data)) {
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
            return back()->withFlash('Customer has been successfully deleted.', 'success', true);
        }
    }
}

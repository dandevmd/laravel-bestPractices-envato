<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CustomersFilter;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomersCollection;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomersResource;

class CustomerController extends Controller
{
    /**
     *GOOD SEARCH FILTER IMPLEMENTED
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $filterCustomers = $filter->transform($request);
        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterCustomers);

        if ($includeInvoices) {
            $customers = $customers->with('invoices');
        }


        return new CustomersCollection($customers->paginate()->appends($request->query()));
    }


    public function store(StoreCustomerRequest $request)
    {
        return new CustomersResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Request $request)
    {
        $includeInvoices = $request->query('includeInvoices');

        if ($includeInvoices) {
            return $customer->loadMissing('invoices');
        }

        return new CustomersResource($customer);
    }


    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
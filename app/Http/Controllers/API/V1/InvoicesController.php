<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\BulkStoreInvoiceRequest;
use App\Models\Invoices;
use Illuminate\Http\Request;
use App\Filters\V1\InvoicesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\InvoiceCollection;
use App\Http\Requests\StoreInvoicesRequest;
use App\Http\Requests\UpdateInvoicesRequest;

class InvoicesController extends Controller
{

    public function bulkStore(BulkStoreInvoiceRequest $request)
    {
        Invoices::insert($request->all());
    }



    public function index(Request $request)
    {
        $filter = new InvoicesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) <= 0) {
            return new InvoiceCollection(Invoices::paginate());
        }

        $invoices = Invoices::where($queryItems)->paginate();

        return new InvoiceCollection($invoices->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoicesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices)
    {
        return new InvoiceResource($invoices);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoicesRequest $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        //
    }
}
<?php

namespace App\Filters\V1;

use App\Filters\ApiFilters;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilters
{

  protected $safeParams = [
    'customer_id' => ['eq'],
    'amount' => ['eq', 'lt', 'gt', 'lte', 'gte'],
    'status' => ['eq', 'ne'],
    'billed_at' => ['eq', 'lt', 'gt', 'lte', 'gte'],
    'paid_date' => ['eq', 'lt', 'gt', 'lte', 'gte'],
  ];

  protected $operatorMap = [
    'ne' => '!=',
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
  ];

  protected $columnMap = [
    'customerId' => 'customer_id',
    'billedAt' => 'billed_at',
    'paidDate' => 'paid_dated',

  ];



}
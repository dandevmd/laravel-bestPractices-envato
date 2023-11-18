<?php

namespace App\Filters\V1;

use App\Filters\ApiFilters;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilters
{
  protected $safeParams = [
    'name' => ['eq'],
    'type' => ['eq'],
    'email' => ['eq'],
    'address' => ['eq'],
    'city' => ['eq'],
    'state' => ['eq'],
    'postal_code' => ['eq', 'gt', 'lt'],

  ];

  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
    'ne' => '!='

  ];

  protected $columnMap = [
    'postalCode' => 'postal_code'
  ];



}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['expense_name', 'expense_category', 'expense_date', 'merchant_name', 'expense_cost', 'tax', 'total_cost', 'description', 'receipt', 'status', 'user_id'];
}

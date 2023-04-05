<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //

    /* Displaying List of Expenses */
    public function index()
    {
        return view('expenses.index');
    }

    /* Show the form for creating a new expense */
    public function create()
    {
        return view('expenses.add-expense');
    }

    /* Store a newly created expense in storage.*/
    public function store(Request $request)
    {
        
        dd($request);
        // get all invoices submitted by user
        $invoices = $request->input('invoice');
        if (!empty($invoices) && is_array($invoices)) {
            foreach ($invoices as $key => $val) {
                if ($val['e-category'] && $val['expense-date']) {
                    //upload receipt into public folder - receipts
                    $receiptName = '';

                    foreach ($request->files as $file) {
                        //echo 'ext ' . $file[$key]['fromfile']->getClientOriginalExtension();
                        //echo 'name ' . $file[$key]['fromfile']->getClientOriginalName();
                        $filext = $file[$key]['fromfile']->getClientOriginalExtension();
                        $receiptName = uniqid() . '-' . $val['expense-for'] . '-' . $request->input('user_id') . '.' . $filext;

                        //upload file to local directory
                        $file[$key]['fromfile']->move(public_path('receipts'), $receiptName);
                    }
                    //echo $receiptName . '<br/>';

                    //create expense
                    Expense::create([
                        'expense_name' => $val['expense-for'],
                        'expense_category' => $val['e-category'],
                        'expense_date' => $val['expense-date'],
                        'merchant_name' => $val['merchant-name'],
                        'expense_cost'  => $val['subtotal'],
                        'tax' => $val['tax'],
                        'total_cost' => $val['total'],
                        'description' => $val['expense-description'],
                        'receipt' => $receiptName,
                        'status' => 'inprogress',
                        'user_id' => $request->input('user_id'),
                    ]);
                }
            }
        }
        return redirect('/expense')->with('message', 'Your expense has been added!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function admin()
    {
        $currentDate = Carbon::now();
         // Get date 7 days ago
         $sevenDaysAgo = Carbon::now()->subDays(7);

         // Get date 30 days ago
         $thirtyDaysAgo = Carbon::now()->subDays(30);

         $orderCountD = 'Data Is Comming';
         $totalSalesD = 'Data Is Comming';
         $salesCountD = 'Data Is Comming';
         $orderCountW = 'Data Is Comming';
         $totalSalesW = 'Data Is Comming';
         $salesCountW = 'Data Is Comming';
         $orderCountM = 'Data Is Comming';
         $totalSalesM = 'Data Is Comming';
         $salesCountM = 'Data Is Comming';

            // dd($orderCountD);
        return view('admin.dashboard')
        ->with('orderCountD', $orderCountD)
        ->with('totalSalesD', $totalSalesD)
        ->with('salesCountD', $salesCountD)
        ->with('orderCountW', $orderCountW)
        ->with('totalSalesW', $totalSalesW)
        ->with('salesCountW', $salesCountW)
        ->with('orderCountM', $orderCountM)
        ->with('totalSalesM', $totalSalesM)
        ->with('salesCountM', $salesCountM);
    }

    public function ustore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Use 'users' table for uniqueness check
            'password' => ['required', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity for validation failure
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

      

        return response()->json(['message' => 'Form data submitted successfully'], 200);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Get all customers
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers, 200);
    }

    // Create a new customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $customer = Customer::create($validated);
        return response()->json($customer, 201);
    }

    // Update a customer
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validated);
        return response()->json($customer);
    }

    // Delete a customer
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
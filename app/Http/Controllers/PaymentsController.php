<?php
//Controller for Payments Page(Billing)
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index(Request $request)
    {
      
        $invoices = Invoice::all();

        
        if ($request->has('json')) {
            return response()->json($invoices);
        }

       
        return view('billings', compact('invoices'));
    }
    public function store(Request $request)
{

    $request->validate([
        'owner_name' => 'required',
        'contact_number' => 'required',
        'email' => 'nullable|email',
        'patient_id' => 'required',
        'pet_name' => 'required',
        'breed' => 'required',
        'service_date' => 'required|date',
        'service_description' => 'required',
        'cost_per_service' => 'required|numeric|min:0',  
        'quantity' => 'required|integer|min:1',
        'medication_name' => 'nullable|string',
        'unit_cost' => 'nullable|numeric|min:0',
        'medication_quantity' => 'nullable|integer|min:1',
        'payment_status' => 'required',
    ]);

   
    Invoice::create([
        'owner_name' => $request->owner_name,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'patient_id' => $request->patient_id,
        'pet_name' => $request->pet_name,
        'breed' => $request->breed,
        'service_date' => $request->service_date,
        'service_description' => $request->service_description,
        'cost_per_service' => $request->cost_per_service,  
        'quantity' => $request->quantity,
        'medication_name' => $request->medication_name,
        'unit_cost' => $request->unit_cost,
        'medication_quantity' => $request->medication_quantity,
        'payment_status' => $request->payment_status,
    ]);

    return redirect()->route('billings')->with('success', 'Payment added successfully!');
}



  
    public function destroy($id)
    {
     
        $invoice = Invoice::findOrFail($id);  
        $invoice->delete();

       
        return redirect()->route('billings')->with('success', 'Payment deleted successfully!');
    }

   public function show($id)
{
    
    $invoice = Invoice::find($id);

    if (!$invoice) {
        return response()->json(['message' => 'Invoice not found'], 404);
    }

  
    return response()->json($invoice);
}
}

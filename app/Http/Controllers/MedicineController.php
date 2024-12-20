<?php
//Controller for Medicine Page
namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display the medicines view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $medicines = Medicine::all();
        
       
        return view('inventory', compact('medicines'));
    }

    /**
     * Store a new medicine in the inventory.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string|max:50',
            'expiration_date' => 'required|date',
        ]);

 
        Medicine::create($request->all());

        return redirect()->route('inventory')->with('success', 'Medicine added successfully.');
    }

    /**
     * Delete a medicine from the inventory.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        
        Medicine::destroy($id);

        return redirect()->route('inventory')->with('success', 'Medicine deleted successfully.');
    }
}

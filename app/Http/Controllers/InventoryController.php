<?php
//Controller for Inventory Page in Admin Page (Medicine and Resources)
namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Resource;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display the inventory view with medicines and resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get medicines and resources from the database
        $medicines = Medicine::all();
        $resources = Resource::all();

        
      
        return view('inventory', compact('medicines', 'resources'));
    }
    public function medicines(Request $request)
    {
        $medicines = Medicine::all();
    
        if ($request->has('json')) {
            return response()->json($medicines);
        }
    
        return view('medicines', compact('medicines'));
    }
    
    public function resources(Request $request)
    {
        $resources = Resource::all();
    
        if ($request->has('json')) {
            return response()->json($resources);
        }
    
        return view('resources', compact('resources'));
    }
    /**
     * Store a new medicine in the inventory.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeMedicine(Request $request)
    {
        // Validate the medicine data
        $request->validate([
            'medName' => 'required|string|max:255',
            'medQuantity' => 'required|integer',
            'medUnit' => 'required|string|max:50',
            'medDosage' => 'required|string|max:100',
            'medType' => 'required|string|max:100',
            'medPrescription' => 'required|string|max:3', // Yes/No
            'medMedication' => 'required|string|max:255',
            'medExpiration' => 'required|date',
        ]);

        // Create a new medicine entry
        Medicine::create([
            'name' => $request->medName,
            'quantity' => $request->medQuantity,
            'unit' => $request->medUnit,
            'dosage' => $request->medDosage,
            'type' => $request->medType,
            'prescription' => $request->medPrescription,
            'medication' => $request->medMedication,
            'expiration_date' => $request->medExpiration,
        ]);

        // Redirect back with success message
        return redirect()->route('inventory')->with('success', 'Medicine added successfully!');
    }

    /**
     * Store a new resource in the inventory.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeResource(Request $request)
    {
        // Validate the resource data
        $request->validate([
            'resName' => 'required|string|max:255',
            'resQuantity' => 'required|integer',
            'resUnit' => 'required|string|max:50',
            'resPrescription' => 'required|string|max:3', // Yes/No
            'resExpiration' => 'required|date',
        ]);

        // Create a new resource entry
        Resource::create([
            'name' => $request->resName,
            'quantity' => $request->resQuantity,
            'unit' => $request->resUnit,
            'prescription' => $request->resPrescription,
            'expiration_date' => $request->resExpiration,
        ]);

        // Redirect back with success message
        return redirect()->route('inventory')->with('success', 'Resource added successfully!');
    }

    /**
     * Delete a medicine from the inventory.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyMedicine($id)
    {
        // Find the medicine by ID and delete it
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        // Redirect back with success message
        return redirect()->route('inventory')->with('success', 'Medicine deleted successfully!');
    }

    /**
     * Delete a resource from the inventory.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyResource($id)
    {
        // Find the resource by ID and delete it
        $resource = Resource::findOrFail($id);
        $resource->delete();

        // Redirect back with success message
        return redirect()->route('inventory')->with('success', 'Resource deleted successfully!');
    }
}

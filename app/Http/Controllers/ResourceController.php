<?php
//Controller for Resources page in Admin Page
namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();
        return view('inventory', compact('resources'));
    }

    public function store(Request $request)
    {
        Resource::create($request->all());
        return redirect()->route('inventory')->with('success', 'Resource added successfully.');
    }

    public function destroy($id)
    {
        Resource::destroy($id);
        return redirect()->route('inventory')->with('success', 'Resource deleted successfully.');
    }
}
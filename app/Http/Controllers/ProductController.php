<?php

namespace App\Http\Controllers;

use DataTables;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function showData()
    {
        $dataController = new DataController();
        return $dataController->showDataView();
    }

    
    public function index(Request $request)
{
    if ($request->ajax()) {
        $products = Product::latest()->get(); // Fetch products

        // return Datatables::of($products) // Use $products instead of $data
        //     ->addIndexColumn()
        //     ->addColumn('action', function ($row) {
        //         $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
        //         $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
    }

    // If it's not an AJAX request, load the view with product data
    $products = Product::latest()->get();
    return view('productAjax', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::updateOrCreate([
                'id' => $request->id,
                'title' => $request->title,
                'description' => $request->description
        ]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}

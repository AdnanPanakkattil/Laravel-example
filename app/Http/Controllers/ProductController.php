<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

      public function create()
    {
        return view('products.create');
    }

    // DataTables JSON API
    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select(['id', 'name', 'detail', 'created_at']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('products.show', $row->id).'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ';
                    $btn .= '<a href="'.route('products.edit', $row->id).'" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a> ';
                    $btn .= '<button data-id="'.$row->id.'" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    //store controller

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Product::create($request->all());
        return response()->json(['success' => 'Product added successfully.']);
    }


    //edit controller


        public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    //update controller
   public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());
        return response()->json(['success' => 'Product updated successfully.']);
    }



    //delete controller
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => 'Product deleted successfully.']);
    }


    //show controller
    public function show(Product $product)
    {
       return view('products.show', compact('product'));
    }

}

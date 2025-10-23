<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
        {
            if ($request->ajax()) {
                $products = Product::select(['id', 'name', 'detail'])
                    ->orderBy('created_at', 'desc');
                        return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('action', function ($product) {
                    return '
                        <a href="'.route('products.show', $product->id).'" class="btn btn-primary btn-sm">View</a>
                        <a href="'.route('products.edit', $product->id).'" class="btn btn-warning btn-sm">Edit</a>
                        <form action="'.route('products.destroy', $product->id).'" method="POST" style="display:inline;" class="deleteForm">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
            }

            return view('products.index');
        }

        public function create(): View
            {
                return view('products.create');
            }





public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'detail' => 'required|string|max:255',
    ]);

    Product::create($validated);

    return response()->json(['message' => 'Product created successfully!']);
}







        public function show($id): View
            {
                $product = Product::findOrFail($id);
                return view('products.show', compact('product'));
            }

        public function edit(string $id): View
            {
                $product = Product::findOrFail($id);
                return view('products.edit', compact('product'));
            }

        public function update(Request $request, string $id)
            {
                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'detail' => 'required|string|max:255',
                ]);

                $product = Product::findOrFail($id);
                $product->update($validated);

                // ✅ Flash message for success
                return redirect()->route('products.index')
                ->with('success', 'Product updated successfully!');
            }


        public function destroy(string $id): RedirectResponse
            {
                $product = Product::findOrFail($id);
                $product->delete();

                return redirect()
                    ->route('products.index')
                    ->with('flash_message', 'Product deleted successfully!');
            }
}

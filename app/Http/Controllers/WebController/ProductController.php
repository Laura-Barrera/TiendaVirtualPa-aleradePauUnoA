<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Factory|View|Application
    {
        $data['products'] = Product::all();
        return view('components.product.index', $data);
    }

    public function create(): Factory|View|Application
    {
        return view('components.product.create');
    }

    public function store(ProductRequest $request): Redirector|Application|RedirectResponse
    {
        $data = request()->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $product = new Product($data);
        $product->save();
        return redirect('product/management')->with('message', 'successfulProductCreation');
    }

    public function edit(Product $product): Factory|View|Application
    {
        return view('components.product.edit', compact('product'));
    }

    public function update(Product $product, ProductUpdateRequest $request): Redirector|Application|RedirectResponse
    {
        $data = request()->except(['_token', '_method']);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->getAttribute('image'));
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $product->update($data);
        $product->save();

        return redirect('product/management')->with('message', 'successfulProductUpdate');
    }

    public function destroy(Product $product): Redirector|Application|RedirectResponse
    {
        if (Storage::delete('public/' . $product->getAttribute('image'))) {
            $product->delete();
        }

        return redirect('product/management')->with('message', 'successfulProductDeletion');
    }
}

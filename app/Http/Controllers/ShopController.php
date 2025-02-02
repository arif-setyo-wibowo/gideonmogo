<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start with base query
        $query = Produk::with('kategori');

        // Determine items per page
        $perPage = $request->input('show', 12);
        if ($perPage == 'all') {
            $perPage = Produk::count(); // Show all products
        }

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Get actual min and max prices
        $actualMinPrice = Produk::min('harga') ?? 0;
        $actualMaxPrice = Produk::max('harga') ?? 10000;

        // Set default min and max prices
        $minPrice = 0;
        $maxPrice = 10000;

        // If there are actual products with prices within the range, adjust slider
        if ($actualMinPrice > 0 || $actualMaxPrice < 10000) {
            $minPrice = max(0, $actualMinPrice);
            $maxPrice = min(10000, $actualMaxPrice);
        }

        // Price filtering
        $filterMinPrice = $request->input('min_price', $minPrice);
        $filterMaxPrice = $request->input('max_price', $maxPrice);

        // Ensure filter prices are within 0-10000 range
        $filterMinPrice = max(0, min($filterMinPrice, 10000));
        $filterMaxPrice = max(0, min($filterMaxPrice, 10000));

        // Apply price filter
        $query->whereBetween('harga', [$filterMinPrice, $filterMaxPrice]);

        // Sorting
        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('harga', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('harga', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Paginate results
        $products = $query->paginate($perPage);
        
        // Fetch all categories with their product count
        $categories = Kategori::withCount('produks')->get();
        
        // Ensure pagination always shows
        $products->withPath($request->path());
        
        return view('shop', compact(
            'products', 
            'categories', 
            'minPrice', 
            'maxPrice', 
            'actualMinPrice', 
            'actualMaxPrice', 
            'filterMinPrice', 
            'filterMaxPrice'
        ));
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
        //
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}

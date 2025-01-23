<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Client\Request;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::latest()->get();

        return view('welcome', compact('commandes'));
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
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'nom_client' => 'required|string|max:255',
                'product_name' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            // Create the commande
            $commande = Commande::create($validatedData);

            // Return success response
            return response()->json([
                'message' => 'Commande created successfully',
                'data' => $commande
            ], 201);
        } catch (\Exception $e) {
            // Handle exceptions and return error response
            return response()->json([
                'message' => 'An error occurred while creating the commande',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, Commande $commande)
    {
        $commande->update($request->validated());

        return response()->json([
            'message' => 'Commande updated successfully',
            'data' => $commande
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
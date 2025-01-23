<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    // Allow mass assignment for the specified fields
    protected $fillable = [
        'nom_client',
        'product_name',
        'price',
        'quantity',
    ];

    /**
     * Get the total cost of the commande.
     *
     * @return float
     */
    public function getTotalCostAttribute()
    {
        return $this->price * $this->quantity;
    }
}
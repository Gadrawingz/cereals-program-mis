<?php

namespace App\Models;

use CodeIgniter\Model;

class FertilizerModel extends Model
{
    protected $table            = 'fertilizer';
    protected $primaryKey       = 'item_id';
    protected $allowedFields    = [
        'category', 
        'item_type', 
        'quantity', 
        'price_per_kg', 
        'subsidy_value', 
        'comp_id'
    ]; 
}

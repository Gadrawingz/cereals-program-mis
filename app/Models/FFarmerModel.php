<?php

// Fert_Farmer Model
namespace App\Models;

use CodeIgniter\Model;

class FFarmerModel extends Model
{
    protected $table            = 'fert_farmer';
    protected $primaryKey       = 'fert_id';
    
    protected $allowedFields    = [
        'cereal_id',
        'farmer_id',
        'quantity',
        'fert1',
        'fert2',
        'fert3',
        'status',
        'created_at'
    ];


}
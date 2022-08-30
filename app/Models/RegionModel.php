<?php

namespace App\Models;
use CodeIgniter\Model;

class RegionModel extends Model
{
    protected $table            = 'region';
    protected $primaryKey       = 'place_id';
    protected $allowedFields    = [
        'cereal_id',
        'district_id',
        'created_at',
        'updated_at'
    ];

    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

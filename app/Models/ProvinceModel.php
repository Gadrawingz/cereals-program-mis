<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinceModel extends Model
{
    protected $table            = 'province';
    protected $primaryKey       = 'province_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['province_name'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;
}

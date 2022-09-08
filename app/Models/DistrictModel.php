<?php

namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model
{
    protected $table            = 'district';
    protected $primaryKey       = 'district_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['district_name'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;
}

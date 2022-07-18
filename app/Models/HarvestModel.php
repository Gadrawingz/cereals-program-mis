<?php namespace App\Models;

use CodeIgniter\Model;

class HarvestModel extends Model {

	protected $table = 'harvest';
	protected $primaryKey = 'harvest_id';
	protected $allowedFields = [
		'farmer_id',
		'cereal_id',
		'season',
		'quantity',
		'current_price',
		'outcome',
		'status',
		'harvest_date'
	];
}
// Gadrawin's coding -> @gadrawingz, @donnekt
?>
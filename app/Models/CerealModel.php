<?php namespace App\Models;

use CodeIgniter\Model;

class CerealModel extends Model {

	protected $table = 'cereal';
	protected $primaryKey = 'cereal_id';
	protected $allowedFields = [
		'cereal_name',
		'cereal_type',
		'land_type',
		'cereal_price',
		'quantity',
		'season',
		'rainy',
		'sunny',
		'status',
		'created'
	];
}
// Gadrawin's coding -> @gadrawingz, @donnekt
?>
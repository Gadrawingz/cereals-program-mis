<?php namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model {

	protected $table = 'application';
	protected $primaryKey = 'app_id';
	protected $allowedFields = [
		'farmer_id',
		'district',
		'cereal_id',
		'quantity',
		'season',
		'status',
		'app_date'
	];
}
// Gadrawin's coding -> @gadrawingz, @donnekt
?>
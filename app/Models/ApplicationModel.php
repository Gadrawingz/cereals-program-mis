<?php namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model {

	protected $table = 'application';
	protected $primaryKey = 'app_id';
	protected $allowedFields = [
		'farmer_id',
		'cereal_id',
		'quantity',
		'season',
		'app_date',
	];


}
?>
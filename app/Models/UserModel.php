<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

	protected $table = 'farmer';
	protected $primaryKey = 'farmer_id';
	protected $allowedFields = [
		'firstname',
		'lastname',
		'province',
		'district',
		'sector',
		'cell',
		'village',
		'gender',
		'telephone',
		'password',
		'status',
		'created_at'
	];


}
?>
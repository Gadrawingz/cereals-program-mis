<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {

	protected $table = 'admin';
	protected $primaryKey = 'admin_id';
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
		'admin_role',
		'password',
		'status'
	];


}
?>
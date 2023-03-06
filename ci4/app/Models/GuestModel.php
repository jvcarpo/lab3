<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'jvcarpo_myguests';

    protected $allowedFields = ['name', 'email', 'message'];
	
	 public function getGuest()
    {       
        return $this->findAll();
    }
}

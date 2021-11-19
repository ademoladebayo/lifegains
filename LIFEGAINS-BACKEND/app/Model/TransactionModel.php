<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function student()
    {
        return $this->hasOne(StudentModel::class, 'id', 'student_id');
    }

}

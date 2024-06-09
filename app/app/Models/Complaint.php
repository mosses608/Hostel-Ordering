<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_type',
        'description',
        'file_complaint',
        'status',
        'responses',
    ];

    public static function find($id){
        $complaints = self::all();

        foreach($complaints as $complain){
            if($complain['id'] == $id){
                return $complain;
            }
        }
    }
}

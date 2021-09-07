<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App\Models
 * @property string $firstname
 * @property string $lastname
 * @property integer $company_id
 * @property Company $company
 * @property string $email
 * @property string $phone
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'company_id', 'email', 'phone'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getNameAttribute()
    {
        return "$this->firstname $this->lastname";
    }
}

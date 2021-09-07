<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Company
 * @package App\Models
 * @property string $name
 * @property string $email
 * @property string $website
 * @property string $logo_link
 * @property Employee $employees
 */
class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'email', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getLogoLinkAttribute() {
        if ($url = $this->getFirstMediaUrl('logo')) {
            return $url;
        }
        return url('images/default.jpg');
    }
}

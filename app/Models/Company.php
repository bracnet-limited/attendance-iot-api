<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users(): HasMany
    {
        return $this->hasMany(Users::class);
    }

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function company_devices(): HasMany
    {
        return $this->hasMany(CompanyDevice::class);
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }
}

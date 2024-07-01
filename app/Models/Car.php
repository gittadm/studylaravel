<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes, HasCreator;

    protected $table = 'cars';
    // public $timestamps = false; // отключить created_at, updated_at $table->timestamps();

    protected $fillable = ['vin', 'model'];

    protected $casts = [
        'is_sold' => 'boolean',
    ];

    public $x = 123;

    // $car->short_model_name

    public function getShortModelNameAttribute()
    {
        return substr($this->model, 0, 1);
    }

    public function getFullInfoAttribute()
    {
        // 'VIN - Model (color)'

        if ($this->color) {
            return $this->vin . ' - ' . $this->model . '(' . $this->color . ')';
        }

        return $this->vin . ' + ' . $this->model;
    }

    public function getFullInfo()
    {
        // 'VIN - Model (color)'

//        if ($this->color) {
//            return $this->vin . ' - ' . $this->model . '(' . $this->color . ')';
//        }
//
//        return $this->vin . ' + ' . $this->model;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

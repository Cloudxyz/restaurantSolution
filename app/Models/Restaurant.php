<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Restaurant
 * @package App\Models
 * @version March 12, 2022, 5:21 pm UTC
 *
 * @property integer $id
 */
class Restaurant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'restaurants';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|unique:restaurants'
    ];

    
}

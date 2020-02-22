<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ["id"];

    static public $rules = [
            'name'   => 'required',
            'email'  => 'required|unique:authors',
            'gender' => 'in:male,female',
        ];
}

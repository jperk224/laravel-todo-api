<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    // primary key 'id' is assumed by Eloquent, as well as
    // created_at and updated_at fields for the todos table

    // Fields that are allowed mass assignment
    protected $fillable = [
        'category',
    ];

    // Category-Todo relationship
    public function todos() 
    {   
        return $this->hasMany(Todo::class);
    }
}

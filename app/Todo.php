<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todos';

    // primary key 'id' is assumed by Eloquent, as well as
    // created_at and updated_at fields for the todos table

    // Fields that are allowed mass assignment
    protected $fillable = [
        'name',
        'category_id',
        'status'
    ];

    // Todo-Category relationship
    public function category() 
    {   
        return $this->belongsTo(Category::class);
    }
}

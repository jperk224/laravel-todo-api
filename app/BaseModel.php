<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaseModel extends Model
{
    // function to return an array of enum values for a given field
    // adapted from https://stackoverflow.com/questions/26991502/get-enum-options-in-laravels-eloquent
    public static function getPossibleEnumValues($name)
    {
        $instance = new static; // create an instance of the model to be able to get the table name
        // use raw SQL to get the column from the table where the field is the argument passed in
        $type = DB::select(DB::raw('SHOW COLUMNS FROM '. $instance->getTable() . ' WHERE Field = "' . $name . '"'))[0]->Type;
        // create the $matches array of statuses
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        // $matches[1] should return a string of the match after 'enum('
        // turn that string into an array, trim the single quotes off and add it to enum array
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            $enum[] = $v;
        }
        return $enum;
    }
}

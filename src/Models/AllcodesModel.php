<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class AllcodesModel extends Model
{
    protected $table = 'allcodes';
    public $fillable = [
        'id', 'keymap', 'type', 'value', 'created_at', 'updated_at'
    ];
    public function usersModel()
    {
        return $this->belongsTo(UsersModel::class);
        // return $this->belongsTo(UsersModel::class, 'price', 'keymap');
    }

}

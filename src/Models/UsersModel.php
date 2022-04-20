<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    public $fillable = [
        'id', 'email', 'password', 'firstName', 'lastName', 'description', 'address', 'phoneNumer',
        'positionid', 'image', 'price', 'roleid', 'updated_at'
    ];
    public function allCodePosition()
    {
        return $this->hasOne(AllcodesModel::class, 'keymap', 'positionid');
    }
    public function allCodePrice()
    {
        return $this->hasOne(AllcodesModel::class, 'keymap', 'price');
    }
}

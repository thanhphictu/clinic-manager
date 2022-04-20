<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;


class LoginAccountsModel extends Model
{
    protected $table = 'loginaccounts';
    public $fillable = [
        'id', 'user', 'password', 'name'
    ];
}

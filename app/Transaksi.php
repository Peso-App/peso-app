<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $guarded = [];

    public function postnya() {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function penyedianya()
    {
        return $this->hasOne(User::class, 'id', 'penyedia_id');
    }
}

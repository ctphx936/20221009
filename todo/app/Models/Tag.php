<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    public $timestamps = false;
    
    // テーブルの紐付け(テーブル名がモデル名の複数形の場合は記述の必要なし)
    // テーブル名
    protected $table = 'tags';

    //　可変項目1
    protected $fillable =
    [
        'id',
        'tagname',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}


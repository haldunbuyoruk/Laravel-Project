<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;	

class NewsModel extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $fillable = ['title','summary','content', 'user_id', 'slag'];

    protected $dates = ['deleted_at'];
}

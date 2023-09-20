<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

// class WebPage extends Model  {
class WebPage extends Eloquent {
    protected $connection = 'mongodb';
    protected $collection = 'web_pages';
    protected $fillable = ['url', 'content'];
}

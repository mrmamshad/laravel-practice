<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Static_;

class Job extends Model
{
    protected $table = 'job_listing';
    protected $fillable = ['title', 'income'];

}

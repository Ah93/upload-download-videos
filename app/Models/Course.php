<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'c_title',
        'c_category',
        'c_vid_file_name',
        'c_vid_file_path',
        'c_thumb_file_name',
        'c_thumb_file_path',
        'c_adoc_file_name',
        'c_adoc_file_path',
        'c_description',
        'uploaded_by'
    ];
}

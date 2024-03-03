<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'mode',
        'date',
        'overview',
        'process',
        'question_papers',
        'syllabus',
        'preparation_tips',
        'cutoff',
        'news',
        'colleges',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
    ];
    
    // public function setDateAttribute($value)
    // {
    //   $this->attributes['question_papers'] = json_encode($value);
    // }
    
    public function college()
    {
        return $this->belongsTo(College::class);
    }
}

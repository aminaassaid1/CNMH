<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'projetId',
    ];
    public function projects()
    {
        return $this->belongsTo(Projects::class);
    }
}

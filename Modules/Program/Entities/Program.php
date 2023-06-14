<?php

namespace Modules\Program\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Project\Entities\Project;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Program\Database\factories\ProgramFactory::new();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}

<?php

namespace Modules\Coordinator\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Project\Entities\Project;

class Coordinator extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Coordinator\Database\factories\CoordinatorFactory::new();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

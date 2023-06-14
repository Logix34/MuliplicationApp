<?php

namespace Modules\Project\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Coordinator\Entities\Coordinator;
use Modules\Program\Entities\Program;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectFactory::new();
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }
    public function denominatorLeaders(){
        return $this->hasMany(User::class)->whereHas('roles', function($query) {
            $query->where('name', 'Denominational Leader');
        });
    }

    public function planters()
    {
        return $this->hasMany(User::class)->whereHas('roles', function($query) {
            $query->where('name', 'Church Planter');
        });
    }


}

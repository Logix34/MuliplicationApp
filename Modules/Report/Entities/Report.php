<?php

namespace Modules\Report\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Report\Database\factories\ReportFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

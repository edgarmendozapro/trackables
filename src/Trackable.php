<?php

namespace EdgarMendozaTech\Trackables;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Trackable extends Model
{
    protected $table = 'trackables';

    protected $fillable = ['ip', 'type', 'from', 'position'];

    public $timestamps = false;

    public function trackable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilterByDateAndType(
        $query,
        string $from,
        string $to,
        string $type
    ) {
        return $query
            ->where('trackable_type', $type)
            ->where('created_at', '>', $from)
            ->where('created_at', '<=', $to)
            ->orderBy('created_at', 'asc');
    }
}

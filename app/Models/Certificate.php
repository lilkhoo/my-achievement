<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['s'] ?? false, function ($query, $search) {
            return $query->where('course', 'like', '%' . $search . '%');
        });

        $query->when($filters['sort'] ?? 'aesthetic', function ($query, $sort) {
            if ($sort == 'terbaru' || ($sort != 'terbaru' && $sort != 'terlama')) {
                return $query->orderByDesc('created_at');
            } else if ($sort == 'terlama') {
                return $query->orderBy('created_at');
            }
        });
    }
}

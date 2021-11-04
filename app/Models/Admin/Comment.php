<?php

namespace App\Models\Admin;

use Adminetic\Website\Models\Admin\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('comments') ? Cache::forget('comments') : '';
    }

    // Logs
    protected static $logName = 'comment';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

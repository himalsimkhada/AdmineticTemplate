<?php
namespace App\Traits;

use Adminetic\Website\Models\Admin\Post;

trait CategoryMorphedByMany {
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

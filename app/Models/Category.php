<?php

namespace App\Models;

use App\Traits\CategoryMorphedByMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, CategoryMorphedByMany;
}

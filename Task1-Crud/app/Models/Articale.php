<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Articale
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|Articale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Articale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Articale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Articale extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'image'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

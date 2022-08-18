<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class berita extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
            ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopeSearch($query, array $search)
    {
        if(isset($search['search'] ) ? $search['search'] : false)
        {
            return $query->where('title', 'like', '%'. $search['search'] .'%')
                        ->orWhere('description','like', '%'. $search['search'] .'%' );
        }
    }
}

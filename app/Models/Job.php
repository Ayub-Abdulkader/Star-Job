<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['name','position', 'location', 'salary', 'description', 'website', 'logo'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function attachTags($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {
            $newTag = Tag::firstorCreate(['name' => strtolower($tag)]);
            $tagIds[] = $newTag->id;
        }

        $this->tags()->attach($tagIds);
    }
    public function updateTags($tags)
    {
        $tagIds = [];

        foreach ($tags as $tag) {
            $newTag = Tag::firstorCreate(['name' => strtolower($tag)]);
            $tagIds[] = $newTag->id;
        }

        $this->tags()->sync($tagIds);
    }

    public function scopeFilter($query)
    {
        $query
            ->where('name', 'like', '%'. request('search') . '%')
            ->orWhere('position', 'like', '%'. request('search') . '%')
            ->orWhere('location', 'like', '%'. request('search') . '%');
    }
}

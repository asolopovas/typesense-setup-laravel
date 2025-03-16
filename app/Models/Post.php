<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Searchable;

    protected $fillable = [
        'created_at',
        'title',
        'body'
    ];

    public function searchableAs(): string
    {
        return 'posts_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => (string) $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' =>  $this->created_at->timestamp,
        ];
    }
}

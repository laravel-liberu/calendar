<?php

namespace LaravelLiberu\Calendar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Calendar\Contracts\Calendar as Contract;
use LaravelLiberu\Rememberable\Traits\Rememberable;
use LaravelLiberu\TrackWho\Traits\CreatedBy;

class Calendar extends Model implements Contract
{
    use CreatedBy, HasFactory, Rememberable;

    protected $guarded = ['id'];

    protected $casts = ['private' => 'boolean', 'created_by' => 'integer'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function private(): bool
    {
        return $this->private;
    }

    public function readonly(): bool
    {
        return false;
    }
}

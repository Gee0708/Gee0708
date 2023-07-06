<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // 'date',
        'venue',
        // 'link',
    ];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    public function generateLink()
    {
        return url('/attendancesheet/' . $this->id);
    }
}

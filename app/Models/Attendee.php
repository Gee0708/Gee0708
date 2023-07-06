<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class Attendee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'email',
        'contact_number',
        'school',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

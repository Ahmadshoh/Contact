<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function getPhones() {
        return $this->hasMany(Phone::class, 'contact_id', 'id')->get();
    }


    public function getEmails() {
        return $this->hasMany(Email::class, 'contact_id', 'id')->get();
    }
}

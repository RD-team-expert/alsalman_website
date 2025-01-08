<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CognitoSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'name',
        'email',
        'phone',
        'amount',
        'submission_date',
        'submission_data',
    ];
}

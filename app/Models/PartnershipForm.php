<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization',
        'contact_person', // Note snake_case
        'email',
        'phone',
        'website',
        'partnership_type',
        'organization_type',
        'mission_alignment',
        'resources_offered',
        'expectations',
        'previous_partnerships'
    ];

}

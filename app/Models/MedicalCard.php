<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'notes',
    ];

    /**
     * Визначає зв'язок належить до пацієнта.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

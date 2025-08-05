<?php

namespace Modules\Documentation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slide extends Model
{
    protected $fillable = [
        'document_id',
        'title',
        'content',
        'slide_number',
        'slide_type',
        'background_color',
        'text_color',
        'layout'
    ];

    protected $casts = [
        'slide_number' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}

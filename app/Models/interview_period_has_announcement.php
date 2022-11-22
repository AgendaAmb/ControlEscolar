<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class interview_period_has_announcement extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'interview_period_has_announcements';

    protected $fillable = [
        'interview_period_id',
        'announcement_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function period()
    {
        return $this->belongsTo(Period::class, 'interview_period_id', 'id');
    }
}

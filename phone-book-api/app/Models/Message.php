<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    const TYPE_EMAIL = 'EMAIL';
    const TYPE_TEXT = 'TEXT';

    const STATUS_QUEUED = 'QUEUED';
    const STATUS_SENT = 'SENT';
    const STATUS_FAILED = 'FAILED';
    const STATUS_DELIVERED = 'DELIVERED';
    const STATUS_READ = 'READ';

    protected $fillable = ['type', 'body', 'status', 'user_id', 'contact_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = auth()->id() ?? $value;
    }
}

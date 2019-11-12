<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $table = "document";

    public $timestamps = true;

    protected $fillable = ["name", "file", "status", "type", "publish_date", "expiration_date", "created_by_id", "modified_by_id", "assigned_user_id"];

    /**
    * get created by user object
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


    /**
    * get modified by user object
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function modifiedBy()
    {
        return $this->belongsTo(User::class, 'modified_by_id');
    }


    /**
    * get assigned to user object
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }


    /**
    * get type object for this document
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function getType()
    {
        return $this->belongsTo(DocumentType::class, 'type');
    }
}

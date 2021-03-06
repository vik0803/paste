<?php

namespace Wdi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Paste.
 */
final class Paste extends Model
{
    const TABLE_NAME = "pastes";
    
    /** {@inheritdoc} */
    protected $table = self::TABLE_NAME;
    
    /** {@inheritdoc} */
    protected $fillable = ["paste_id", "language_id", "slug", "name", "extension", "code", "description", "password"];
    
    /** {@inheritdoc} */
    protected $guarded = ["id"];
    
    /** {@inheritdoc} */
    protected $hidden = ["password"];
    
    /** {@inheritdoc} */
    protected $casts = [
        "paste_id" => "integer",
        "user_id" => "integer",
        "language_id" => "integer",
    ];
    
    /** {@inheritdoc} */
    public function getRouteKeyName()
    {
        return "slug";
    }
    
    /**
     * Returns the name plus the extension
     *
     * @return string
     */
    public function getFileNameAttribute() : string
    {
        return "{$this->name}.{$this->extension}";
    }
    
    /**
     * Use built-in function to store the password for
     * a paste
     *
     * @param string|null $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = !is_null($value) ? bcrypt($value) : $value;
    }
    
    /**
     * Determine if a paste is a fork
     * of another one
     *
     * @return bool
     */
    public function isAFork() : bool
    {
        return !is_null($this->paste_id);
    }
    
    /**
     * Determine is a paste has forks related
     *
     * @return bool
     */
    public function hasForks() : bool
    {
        return $this->forks->count() > 0;
    }
    
    /**
     * A paste may have different forks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forks() : HasMany
    {
        return $this->hasMany(self::class);
    }
    
    /**
     * A paste may be a fork of another paste.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forked() : BelongsTo
    {
        return $this->belongsTo(self::class, "paste_id", "id");
    }
    
    /**
     * A paste may have a language related.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language() : BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * if it entity need insert data in bulk.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'body',
        'published_at',
    ];

    /**
     * used if your class name doesn't match database table name.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * used if primary key is not named id.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * if your class don't use timestamps change value to 'false'.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * if your classe use other connection set it in variable connection
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * if your class uses custom fields, define it name in array.
     *
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];

    /**
     * if it class need change field before to save in database.
     */
    public function setTitleAttribute(mixed $value): void
    {
        $this->attributes['title'] = strtolower($value);
    }

    /**
     * if it class need change field before to show external entities.
     */
    public function getTitleAttribute(mixed $value): mixed
    {
        return ucfirst($value);
    }

    /**
     * if it entity need filter in queries.
     */
    public function scopeOfType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    /**
     * if it entity need run the filter in the class is instantiated.
     */
    public static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

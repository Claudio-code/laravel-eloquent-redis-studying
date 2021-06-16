<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /** @var array */
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
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];
}

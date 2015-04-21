<?php namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface {

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );


    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'desc',
        'content',
        'avatar',
        'views',
        'likes',
        'homepage',
        'status',
        'feature'
    ];

    /**
     * post belong to one category.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
       return $this->belongsTo('App\Category');
    }

    /**
     * like tags.
     * @param $query
     * @param $tag
     * @return mixed
     */
    public function scopeTagged($query, $tag)
    {
        if (strlen($tag) > 2) {
            $query->where('title', 'LIKE', '%'.$tag.'%');
        }
    }

    /**
     * like tags.
     *
     * @param $query
     *
     * @return mixed
     * @internal param bool $case
     * @internal param $tag
     */
    public function scopeHomepage($query)
    {
       return $query->where('homepage', true);
    }

    /**
     * filter feature post.
     * @param $query
     *
     * @return mixed
     */
    public function scopeFeature($query)
    {
        return $query->where('feature', true);
    }

    /**
     * get the tags that associated with given post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('name');
    }

    /**
     * To solve problem with return empty object and cannot using format() method on published_at.
     * @param $date
     * @return Carbon
     */
    public function getUpdatedAtAttribute($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

}

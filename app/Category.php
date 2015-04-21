<?php namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface {

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

	protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'homepage',
        'icon'
    ];

    /**
     * parent of this category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id', 'id');
    }

    /**
     * sub of this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');

    }
    /**
     * category have many posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
       return $this->hasMany('App\Post');
    }

    /**
     * 5 posts display in homepage.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function homepagePosts()
    {
        return $this->hasMany('App\Post')->homepage()->latest()->limit(4);
    }

}

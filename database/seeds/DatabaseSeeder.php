<?php

use App\Category;
use App\Post;
use App\Question;
use App\Services\LoremIpsumGenerator;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('PostTableSeeder');
		//$this->call('ClearSeeder');
	}

}

class ClearSeeder extends Seeder {
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('post_tag')->truncate();
        DB::table('posts')->truncate();
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

class PostTableSeeder extends Seeder {
    /**
     * seed
     */


    public function run()
    {
        $lipsum = new LoremIpsumGenerator;

        $post_image_default = 'post.png';
        $category_icon_default = 'icon.png';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('post_tag')->truncate();
        DB::table('posts')->truncate();
        DB::table('categories')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
            'name' => 'Admin',
            'email' => 'tieumaster@yahoo.com',
            'password' => Hash::make('232323')
        ]);
        $category =  Category::create([
            'name' => 'Main Category 1',
            'icon' => $category_icon_default
        ]);
        $sub1 = Category::create([
            'name' => 'Sub 1 Category 1',
            'icon' => $category_icon_default,
            'parent_id' => $category->id
        ]);

        $sub2  = Category::create([
            'name' => 'Sub 2 Category 1',
            'icon' => $category_icon_default,
            'parent_id' => $category->id
        ]);

        $category2 =  Category::create([
            'name' => 'Main Category 2',
            'icon' => $category_icon_default
        ]);
        $sub12 = Category::create([
            'name' => 'Sub 1 Category 2',
            'icon' => $category_icon_default,
            'parent_id' => $category2->id
        ]);

        $sub22  = Category::create([
            'name' => 'Sub 2 Category 2',
            'icon' => $category_icon_default,
            'parent_id' => $category2->id
        ]);

        $categories = [$category->id, $sub1->id, $sub2->id, $category2->id, $sub12->id, $sub22->id];



        $tagIds = [];
        for ($i = 1; $i < 10; $i ++) {
           $tagIds[] = Tag::create([
                'name' => $lipsum->getContent(3, 'txt')
            ])->id;
        }
        foreach ($categories as $category) {
            for ($i = 1; $i < 40; $i ++) {
               $rand = rand(0,10);
               $homepage = ($rand == 5) ? true : false;
               $feature = ($rand == 3) ? true : false;
               $post = Post::create([
                   'category_id' => $category,
                   'title' => $lipsum->getContent(10, 'txt').' '.Uuid::generate(),
                   'desc' => $lipsum->getContent(20, 'plain'),
                   'content' => $lipsum->getContent(500),
                   'homepage' => $homepage,
                   'feature' => $feature,
                   'avatar' => $post_image_default
                ]);
               $post->tags()->sync(array_slice($tagIds, 0, rand(1, 10)));
            }
        }
    }
}

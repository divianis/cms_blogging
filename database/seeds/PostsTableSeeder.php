<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use\Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $author1 = User::create([
            'name' => 'M. Sayyidus Shaleh Y.',
            'email' => 'sayyid@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $author2 = User::create([
            'name' => 'Mulazi',
            'email' => 'mulazi@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $author3 = User::create([
            'name' => 'Wahyu Aji Sulaiman',
            'email' => 'aji@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $author4 = User::create([
            'name' => 'M. Zulfikar Isnanto',
            'email' => 'zulfikar@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $author5 = User::create([
            'name' => 'Pradita Putri Prayitna',
            'email' => 'pradita@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $author6 = User::create([
            'name' => 'Alifian Arfa Rosyadi',
            'email' => 'alifian@gmail.com',
            'password' => Hash::make('11111111')
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Design'
        ]);
        $category4 = Category::create([
            'name' => 'Partnership'
        ]);
        $category5 = Category::create([
            'name' => 'Hiring'
        ]);
        $category6 = Category::create([
            'name' => 'Product'
        ]);

        $tag1 = Tag::create([
           'name' => 'Job'
        ]);
        $tag2 = Tag::create([
            'name' => 'Customer'
        ]);
        $tag3 = Tag::create([
            'name' => 'Record'
        ]);
        $tag4 = Tag::create([
            'name' => 'Progress'
        ]);
        $tag5 = Tag::create([
            'name' => 'Version'
        ]);
        $tag6 = Tag::create([
            'name' => 'Milestone'
        ]);

//        $post1 = Post::create([
//            'title' => 'We relocated our office to a new designed garage',
//            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
//            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
//            'category_id' => $category1->id,
//            'image' => 'posts/1.jpg',
//            'user_id' => $author1->id
//        ]);

        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = $author3->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);
        $post4 = $author4->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg'
        ]);
        $post5 = $author5->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category5->id,
            'image' => 'posts/5.jpg'
        ]);
        $post6 = $author6->posts()->create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category6->id,
            'image' => 'posts/6.jpg'
        ]);
        $post7 = $author1->posts()->create([
            'title' => 'Kenapa aku bisa bahagia',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category1->id,
            'image' => 'posts/7.jpg'
        ]);
        $post8 = $author1->posts()->create([
            'title' => 'Ayah kenapa aku berbeda',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category6->id,
            'image' => 'posts/8.jpg'
        ]);
        $post9 = $author1->posts()->create([
            'title' => 'Sayang kalau punya anak namun malah stress',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category1->id,
            'image' => 'posts/9.jpg'
        ]);
        $post10 = $author1->posts()->create([
            'title' => 'Penemuan gila sang arkeolog sebatang kara',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category1->id,
            'image' => 'posts/10.jpg'
        ]);
        $post11 = $author1->posts()->create([
            'title' => 'Filsafah mengaku mencari celah untuk dapat masuk',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category2->id,
            'image' => 'posts/11.jpg'
        ]);
        $post12 = $author1->posts()->create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category2->id,
            'image' => 'posts/12.jpg'
        ]);
        $post13 = $author1->posts()->create([
            'title' => 'So happy and beautiful girl',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category4->id,
            'image' => 'posts/13.jpg'
        ]);
        $post14 = $author1->posts()->create([
            'title' => 'It\'s time for duel',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category4->id,
            'image' => 'posts/14.jpg'
        ]);
        $post15 = $author1->posts()->create([
            'title' => 'PBIC 2020 tetap memiliki juara bertahan BLACK DRAGON',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category3->id,
            'image' => 'posts/15.jpg'
        ]);
        $post16 = $author1->posts()->create([
            'title' => 'Naruto dapatkan sequel cerita baru',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'category_id' => $category3->id,
            'image' => 'posts/16.jpg'
        ]);

            $post1->tags()->attach([$tag1->id, $tag2->id, $tag3->id]);
            $post2->tags()->attach([$tag4->id, $tag5->id, $tag6->id]);
            $post3->tags()->attach([$tag1->id, $tag2->id, $tag4->id]);
            $post4->tags()->attach([$tag1->id, $tag2->id, $tag5->id]);
            $post5->tags()->attach([$tag1->id, $tag2->id, $tag6->id]);
            $post6->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post7->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post8->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post9->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post10->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post11->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag4->id, $tag5->id]);
            $post12->tags()->attach([$tag1->id, $tag2->id, $tag3->id, $tag5->id, $tag6->id]);
            $post13->tags()->attach([$tag1->id, $tag2->id, $tag4->id, $tag5->id, $tag6->id]);
            $post14->tags()->attach([$tag1->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post15->tags()->attach([$tag2->id, $tag3->id, $tag4->id, $tag5->id, $tag6->id]);
            $post16->tags()->attach([$tag1->id, $tag2->id, $tag5->id, $tag6->id]);
    }
}

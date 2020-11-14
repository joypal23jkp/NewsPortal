<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
            [
                'category' => 'Travel',
                'title' => 'Financial news: A new company is born today at the stock market',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.',
                'likes' =>100,
                'img_url' => 'img/bg-img/16.jpg',
                'slug' =>'financia-news-a-new-company-is-born-today-at-the-stock-market'
            ]
        );
        DB::table('news')->insert(
            [
                'category' => 'Entertainment',
                'title' => 'Health news: A new company is born today at the stock market',
                'body' => 'ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.',
                'likes' =>101,
                'img_url' => 'img/bg-img/16.jpg',
                'slug' => 'health-news-a-new-company-is-born-today-at-the-stock-market'
            ]
        );
        DB::table('news')->insert(
            [
                'category' => 'Politics',
                'title' => 'Politics news: A new company is born today at the stock market',
                'body' => 'dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.',
                'likes' =>102,
                'img_url' => 'img/bg-img/16.jpg',
                'slug' => 'politics-news-a-new-company-is-born-today-at-the-stock-market'
            ]
        );
        DB::table('news')->insert(
            [
                'category' => 'Travels',
                'title' => 'Financial news: A new company is born today at the stock market',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.',
                'likes' =>100,
                'img_url' => 'img/bg-img/16.jpg',
                'slug' => Str::slug('Financial news A new company is born today at the stock market', '-')
            ]
        );
    }
}

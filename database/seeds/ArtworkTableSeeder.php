<?php
use \App\Artwork;

Class ArtworkTableSeeder extends DatabaseSeeder {

    public function run(){
        $faker = Faker\Factory::Create();
        //Artwork::truncate();

        for ($i=0; $i < 50; $i++){
            $artwork = Artwork::create(array(
                'user_id' => rand(1,5),
                'title' => $faker->realtext(rand(20,40)),
                'description' => $faker->sentence(20),
                'material' => 'Canvas',
                'dimension' => '100 x 150 cm',
                'category_id' => rand(1,5),
                'is_auction' => rand(0,1),
                'selling_price' => $faker->randomNumber(7),
                'status' => rand(1,5),
                'visit' => $faker->randomNumber(2),
                'slug' => $faker->slug,
                'inactive' => 0
            ));
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class KanjisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kanji::class, 100)->create()
        ->each(function ($kanji){
        	$kanji->kanjiwords()
        	->createMany(factory(App\KanjiWord::class, 50)
        	->make()->toArray());
        });
    }
}

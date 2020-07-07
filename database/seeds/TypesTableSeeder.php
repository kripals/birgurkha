<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id'               => 1,
                'section'          => 'Sagarmatha Banner',
                'name'             => NULL,
                'visible'          => 1,
                'position'         => 1,
                'type'             => 'SLIDER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 2,
                'section'          => 'Thorungla Pass Banner',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 2,
                'type'             => 'BANNER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 3,
                'section'          => 'Annapurna Circuit',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 3,
                'type'             => 'DEALS',
                'start_date'       => '2020-07-07',
                'end_date'         => '2020-08-07',
                'add_on_words'     => 'SALE ENDS IN',
                'background_color' => NULL,
                'view_all_buttons' => '1',
            ],
            [
                'id'               => 4,
                'section'          => 'Category Collection',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 4,
                'type'             => 'CATEGORY',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => '#6600ff',
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 5,
                'section'          => 'Coupon Center',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 5,
                'type'             => 'BANNER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 6,
                'section'          => 'Fast 5',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 6,
                'type'             => 'BANNER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 7,
                'section'          => 'Carousel Cards 1',
                'name'             => 'Smartphone And Accessories',
                'visible'          => 0,
                'position'         => 7,
                'type'             => 'CAROUSEL',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 8,
                'section'          => 'Three Musketeers',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 8,
                'type'             => 'BANNER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 9,
                'section'          => 'Carousel Card 2',
                'name'             => 'Best of Electronic Devices',
                'visible'          => 0,
                'position'         => 9,
                'type'             => 'CAROUSEL',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 10,
                'section'          => 'Carousel Card 3',
                'name'             => 'Inspired By Your Shopping Trends',
                'visible'          => 0,
                'position'         => 10,
                'type'             => 'CAROUSEL',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 11,
                'section'          => 'Supporting Trio',
                'name'             => NULL,
                'visible'          => 0,
                'position'         => 11,
                'type'             => 'BANNER',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
            [
                'id'               => 12,
                'section'          => 'Category Carousel Card Collection',
                'name'             => 'Sasto Books',
                'visible'          => 0,
                'position'         => 12,
                'type'             => 'CAROUSEL',
                'start_date'       => NULL,
                'end_date'         => NULL,
                'add_on_words'     => NULL,
                'background_color' => NULL,
                'view_all_buttons' => NULL,
            ],
        ];

        //        \App\Models\Type::truncate();

        DB::table('types')->insert($types);
//        \App\Models\Type::insert($types);
    }
}

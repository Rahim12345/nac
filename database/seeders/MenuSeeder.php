<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                //                id : 1
                'menu_az'=>'WE ARE N.A.C',
                'menu_en'=>'WE ARE N.A.C',
                'slug_az'=>'who-we-are',
                'slug_en'=>'who-we-are',
                'parent_id'=>0
            ],
            [
                //                id : 2
                'menu_az'=>'OUR ADVOCACY',
                'menu_en'=>'OUR ADVOCACY',
                'slug_az'=>'javascript: void(0)',
                'slug_en'=>'javascript: void(0)',
                'parent_id'=>0
            ],
            [
                //                id : 3
                'menu_az'=>'Current issues',
                'menu_en'=>'Current issues',
                'slug_az'=>'current-issues',
                'slug_en'=>'current-issues',
                'parent_id'=>2
            ],
            [
                //                id : 4
                'menu_az'=>'Take action',
                'menu_en'=>'Take action',
                'slug_az'=>str_slug('Take action'),
                'slug_en'=>str_slug('Take action'),
                'parent_id'=>2
            ],
            [
                //                id : 5
                'menu_az'=>'Find your representative',
                'menu_en'=>'Find your representative',
                'slug_az'=>'https://www.ourcommons.ca/members/',
                'slug_en'=>'https://www.ourcommons.ca/members/',
                'parent_id'=>2
            ],
            [
                //                id : 6
                'menu_az'=>'Press centre',
                'menu_en'=>'Press centre',
                'slug_az'=>'javascript: void(0)',
                'slug_en'=>'javascript: void(0)',
                'parent_id'=>0
            ],
            [
                //                id : 7
                'menu_az'=>'Statements',
                'menu_en'=>'Statements',
                'slug_az'=>str_slug('Statements'),
                'slug_en'=>str_slug('Statements'),
                'parent_id'=>6
            ],
            [
                //                id : 8
                'menu_az'=>'Media',
                'menu_en'=>'Media',
                'slug_az'=>str_slug('Media'),
                'slug_en'=>str_slug('Media'),
                'parent_id'=>6
            ],
            [
                //                id : 9
                'menu_az'=>'Community updates',
                'menu_en'=>'Community updates',
                'slug_az'=>str_slug('Community updates'),
                'slug_en'=>str_slug('Community updates'),
                'parent_id'=>6
            ],
            [
                //                id : 10
                'menu_az'=>'GET INVOLVED',
                'menu_en'=>'GET INVOLVED',
                'slug_az'=>'javascript: void(0)',
                'slug_en'=>'javascript: void(0)',
                'parent_id'=>0
            ],
            [
                //                id : 11
                'menu_az'=>'Become a member',
                'menu_en'=>'Become a member',
                'slug_az'=>str_slug('Become a member'),
                'slug_en'=>str_slug('Become a member'),
                'parent_id'=>10
            ],
            [
                //                id : 12
                'menu_az'=>'Volunteer at NAC',
                'menu_en'=>'Volunteer at NAC',
                'slug_az'=>str_slug('Volunteer at NAC'),
                'slug_en'=>str_slug('Volunteer at NAC'),
                'parent_id'=>10
            ],
            [
                //                id : 13
                'menu_az'=>'Become a supporter',
                'menu_en'=>'Become a supporter',
                'slug_az'=>str_slug('Become a supporter'),
                'slug_en'=>str_slug('Become a supporter'),
                'parent_id'=>10
            ],
        ];

        foreach ($menus as $menu)
        {
            Menu::create([
               'menu_az' =>$menu['menu_az'],
               'menu_en' =>$menu['menu_en'],
               'slug_az' =>$menu['slug_az'],
               'slug_en' =>$menu['slug_en'],
               'parent_id' =>$menu['parent_id'],
            ]);
        }
    }
}

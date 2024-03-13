<?php

use App\Category;
use App\Models\Childsubcategory;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        SubCategory::truncate();
        Childsubcategory::truncate();

        //categories
        $category_heat_transfers = Category::create([
            'name' => 'Heat Transfers',
            'type' => 0,
        ]);

        $category_vinyl = Category::create([
            'name' => 'Vinyl',
            'type' => 1,
        ]);

        $category_custom_transfers = Category::create([
            'name' => 'Custom Transfers',
            'type' => 1,
        ]);

        $category_starter_packs = Category::create([
            'name' => 'Starter Packs',
            'type' => 1,
        ]);

        $category_clearance = Category::create([
            'name' => 'Clearance',
            'type' => 1,
        ]);

        $category_digital_art = Category::create([
            'name' => 'Digital Art',
            'type' => 1,
        ]);

        //sub-categories
        $sub_category_graphics_by_type = Subcategory::create([
            'category' => strval($category_heat_transfers->id),
            'subcategory' => 'Graphics By Type'
        ]);
        $sub_category_featured_transfers = Subcategory::create([
            'category' => strval($category_heat_transfers->id),
            'subcategory' => 'Featured Transfers'
        ]);
        $sub_category_graphics_by_category = Subcategory::create([
            'category' => strval($category_heat_transfers->id),
            'subcategory' => 'Graphics By Category'
        ]);

        $sub_category_vinyl_by_type = Subcategory::create([
            'category' => strval($category_vinyl->id),
            'subcategory' => 'Vinyl By Type'
        ]);
        $sub_category_vinyl_by_brand = Subcategory::create([
            'category' => strval($category_vinyl->id),
            'subcategory' => 'Vinyl By Brand'
        ]);
        $sub_category_vinyl_cutters_and_accessories = Subcategory::create([
            'category' => strval($category_vinyl->id),
            'subcategory' => 'Vinyl Cutters & Accessories'
        ]);
        $sub_category_featured = Subcategory::create([
            'category' => strval($category_vinyl->id),
            'subcategory' => 'Featured'
        ]);

        $sub_category_starter_packages = Subcategory::create([
            'category' => strval($category_starter_packs->id),
            'subcategory' => 'Starter Packages'
        ]);

        $sub_category_digital_art_by_category = Subcategory::create([
            'category' => strval($category_digital_art->id),
            'subcategory' => 'Digital Art By Category'
        ]);
        $sub_category_digital_art_by_artist = Subcategory::create([
            'category' => strval($category_digital_art->id),
            'subcategory' => 'Digital Art By Artist'
        ]);

        //child-categories
        foreach ([
                     'Screen Printed',
                     'DTF (Direct to Film)',
                     'Numbered',
                     'Mixed Media',
                     'Rhinestone',
                     'Lettered',
                     'Sequins',
                     'Custom Transfers',
            ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_graphics_by_type->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'Best Selling Graphics',
                     'New Graphics',
                     'Wildside',
                     'Custom Transfers',
                     'Clearance',
            ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_featured_transfers->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                    'Animal',
                    'Hat &amp; Pocket-sized',
                    'Biker',
                    'Bird',
                    'Cancer Awareness',
                    'Car',
                    'Cat',
                    'Christian Inspirational',
                    'Clearance',
                    'Color Changing',
                    'Country',
                    'Custom Transfers',
                    'Dance and Cheer',
                    'Decorative',
                    'Dog',
                    'Entertainment',
                    'Ethnic',
                    'Face Mask',
                    'Family',
                    'Farm Animal',
                    'Floral',
                    'Funny',
                    'Game Wildlife',
                    'Glitter',
                    'Holiday',
                    'Horse',
                    'Insect',
                    'Kids',
                    'Lettering',
                    'Marine Life',
                    'Military',
                    'Mixed Media',
                    'Native American',
                    'Neon',
                    'Numbers',
                    'Occupation',
                    'Patriotic',
                    'Political',
                    'Pride',
                    'Rebel',
                    'Religious',
                    'Reptile',
                    'Resort',
                    'Rhinestone',
                    'Screen Printed',
                    'Sequins',
                    'Sport',
                    'TV',
                    'Trendy',
                    'Ugly Christmas Sweater',
                    'Unique Pets',
                    'Vintage',
                    'Voting',
                    'Western',
                    'Wildlife',
                    'Wildside',
                    'Wine',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_graphics_by_category->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'All Vinyl',
                     'Printable Vinyl',
                     'Heat Transfer Vinyl For Garments',
                     'Sign & Decorative Vinyl',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_vinyl_by_type->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'Oracal',
                     'Siser',
                     'Sparkleberry Ink',
                     'Specialty Materials',
                     'K-Laser Foil',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_vinyl_by_brand->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'All Cutters',
                     'GCC Cutters',
                     'Siser Romeo & Juliet Cutters',
                     'All Accessories',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_vinyl_cutters_and_accessories->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'Vinyl Cutter Starter Package',
                     'Vinyl Packages',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_featured->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'All Starter Packages',
                     'DTF Starter Packages',
                     'Heat Press Starter Packages',
                     'Mug Starter Packages',
                     'Sublimation Starter Packages',
                     'Vinyl Starter Packages',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_starter_packages->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                     'All Starter Packages',
                     'DTF Starter Packages',
                     'Heat Press Starter Packages',
                     'Mug Starter Packages',
                     'Sublimation Starter Packages',
                     'Vinyl Starter Packages',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_starter_packages->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                    'All Digital Art',
                    'Bundles',
                    '3D Art',
                    'Alphabet',
                    'Animals',
                    'Arrows',
                    'Awareness',
                    'Baby',
                    'Baking',
                    'Birthday',
                    'Bless This',
                    'Blessed',
                    'Business',
                    'Ethnic',
                    'Family',
                    'Farm',
                    'Floral',
                    'Food & Drink',
                    'Funny',
                    'Holiday',
                    'Home',
                    'Health & Beauty',
                    'Kids',
                    'Love',
                    'Masks',
                    'Military',
                    'Medical',
                    'Monogram',
                    'Music',
                    'Patriotic',
                    'Patterns',
                    'Police',
                    'Pride',
                    'Religious',
                    'Rememberance',
                    'School',
                    'Seasonal',
                    'Sports',
                    'States',
                    'Sublimation',
                    'Trendy',
                    'Vacation',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_digital_art_by_category->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }

        foreach ([
                    'Bailey and Ginger',
                    'Camus Studio',
                    'Digital Diva',
                    'Harbor Grace Designs',
                    'Jordyn Alison Designs',
                    'Savanas Design',
                    'Shine Green',
                    'Sugar Sugar',
                    'Wispy Willow',
                 ] as $child_sub_category)
        {
            Childsubcategory::create([
                'subcategory' => strval($sub_category_digital_art_by_artist->id),
                'childsubcategory' => $child_sub_category,
            ]);
        }
    }
}

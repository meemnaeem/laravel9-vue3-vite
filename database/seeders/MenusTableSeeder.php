<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyCategory = collect([
            'Soups', 'Chicken Main Course', 'Non-veg Rice', 'Non-veg Noodles'
        ]);

        $dummyCategory->each(function ($value) {
            Category::create(['name' => $value]);
        });

        $this->addSoups();
        $this->addMainCourse();
        $this->addNonVegRice();
        $this->addNonVegNodles();
    }

    private function addSoups()
    {
        Menu::create([
            'name' => 'Chicken Barmee Soup',
            'price' => 170,
            'category_id' => 1,
            'description' => 'Chicken soup is a soup made from chicken, simmered in water, usually with various other ingredients. The classic chicken soup consists of a clear chicken broth, often with pieces of chicken or vegetables; common additions are pasta, dumplings, or grains such as rice and barley.'
        ]);

        Menu::create([
            'name' => 'Chicken Beijing Soup',
            'price' => 160,
            'category_id' => 1,
            'description' => 'Definitely a healthy soup for the whole family. Heat oil in a cooking pan, add chopped ginger, beef minces and saute it. Now add finely chopped onion, chopped mushroom, carrots, soya sauce, crushed black pepper, spring onion mix it well. Add beef or chicken stock cook until mince soft.'
        ]);

        Menu::create([
            'name' => 'Chicken Wanton Soup',
            'price' => 160,
            'category_id' => 1,
            'description' => 'Chicken Wonton Soup Wonton, which translates to swallowing a cloud, is a great way to describe how light these dumplings are. Ground chicken, green onions and flavorings are mixed together then wrapped in wonton wrappers then cooked in a delicious broth for a light and healthy soup.',
        ]);
    }

    private function addMainCourse()
    {
        Menu::create([
            'name' => 'Grilled Chicken Panini',
            'price' => 290,
            'category_id' => 2,
            'description' => 'Fresh mozzarella, roasted red peppers, sliced tomatoes, mixed field greens and balsamic vinaigrette.'
        ]);

        Menu::create([
            'name' => 'Sapo Chicken',
            'price' => 310,
            'category_id' => 2,
            'description' => 'Sapo Chicken is Chinese Indonesian tofu dish traditionally cooked and served in claypot. Sapo chicken might be served plainly as vegetarian dish, or commonly enrichen with chicken, seafood (especially shrimp), minced beef or pork.'
        ]);

        Menu::create([
            'name' => 'Chicken Black Bean',
            'price' => 270,
            'category_id' => 2,
            'description' => 'Fermented black beans are found in Asian markets and once you buy them, they last pretty much forever! Also called salted black beans, they\'re used in the black bean chicken you order from Chinese take-out and has a much different flavor than the Mexican type of black beans'
        ]);
    }

    private function addNonVegRice()
    {
        Menu::create([
            'name' => 'Chicken Fried Rice',
            'price' => 220,
            'category_id' => 3,
            'description' => 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat. It is often eaten by itself or as an accompaniment to another dish.'
        ]);

        Menu::create([
            'name' => 'Hainanese Chicken Rice',
            'price' => 250,
            'category_id' => 3,
            'description' => 'Hainanese chicken rice is a dish adapted from early Chinese immigrants originally from Hainan province in southern China, where it\'s called Wenchang chicken. It is considered one of the national dishes of Singapore.'
        ]);

        Menu::create([
            'name' => 'Chicken Chettinad ',
            'price' => 280,
            'category_id' => 3,
            'description' => 'Chicken Chettinad or Chettinad chicken is a classic Indian recipe, from the cuisine of Chettinad. It consists of chicken marinated in yogurt, turmeric and a paste of red chillies, kalpasi, coconut, poppy seeds, coriander seeds, cumin seeds, fennel seeds, black pepper, ground nuts, onions, garlic and gingelly oil.'
        ]);
    }

    private function addNonVegNodles()
    {
        Menu::create([
            'name' => 'Cart noodle',
            'price' => 220,
            'category_id' => 4,
            'description' => 'Cart noodle is a kind of à la carte noodle which became popular in Hong Kong in the 1950s through independent street vendors operating on roadsides and in public housing estates in low-income districts, using carts.'
        ]);

        Menu::create([
            'name' => 'Chongqing noodles',
            'price' => 260,
            'category_id' => 4,
            'description' => 'Xiao mian is a traditional breakfast dish in Chongqing that is widely consumed by Chongqing residents. The dishes are typically low-priced, and are a common street food in Chongqing. It has been described as a staple food of Chongqing, and is an historic part of the cuisine there.'
        ]);

        Menu::create([
            'name' => 'Chow mein noodles',
            'price' => 280,
            'category_id' => 4,
            'description' => 'Chow mein or Chinese stir-fried noodles, the name being the romanization of the Taishanese chāu-mèing. The dish is popular throughout the Chinese diaspora and appears on the menus of most Chinese restos.'
        ]);
    }
}

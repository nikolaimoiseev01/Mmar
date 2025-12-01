<?php

namespace Database\Seeders;

use App\Helpers\Constant;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public $brands = [
        'prev',
        'Konstantin Grcic'
    ];

    public $categories = [
        [
            'name' => 'Dresses',
            'img' => '/fixed/test/icon-cat-dresses.svg'
        ],
        [
            'name' => 'Tops',
            'img' => '/fixed/test/icon-cat-tops.svg'
        ],
        [
            'name' => 'Bottoms',
            'img' => '/fixed/test/icon-cat-bottoms.svg'
        ],
        [
            'name' => 'Outerwear',
            'img' => '/fixed/test/icon-cat-outerwear.svg'
        ],
        [
            'name' => 'Bags',
            'img' => '/fixed/test/icon-cat-bags.svg',
            'subcategories' => [
                'Shoulder', 'Bags', 'Crossbody', 'Handbags', 'Luggage and Travel', 'Backpacks'
            ]
        ],
        [
            'name' => 'Shoes',
            'img' => '/fixed/test/icon-cat-shoes.svg',
            'subcategories' => [
                'Boots', 'Casual&Flats', 'Heels', 'Sneakers'
            ]
        ],
        [
            'name' => 'Accessories',
            'img' => '/fixed/test/icon-cat-accessories.svg',
            'subcategories' => [
                'Hats', 'Scarves', 'Belts', 'Gloves', 'Wallets', 'Sunglasses', 'Jewelry'
            ]
        ]
    ];

    public function make_post_topics()
    {
        $post_topics = [
            'Sustainability',
            'Materials & Innovation',
            'Style Inspiration',
            'Behind the Brand',
            'New Arrivals'
        ];

        foreach ($post_topics as $topic) {
            \App\Models\PostTopic::create(['name' => $topic]);
        }
    }

    function make_colors()
    {
        $colors = [
            [
                'name' => 'blue',
                'color' => '#366ae3',
                'is_simple_color' => true
            ],
            [
                'name' => 'tiger',
                'color' => null,
                'is_simple_color' => false
            ]
        ];

        foreach ($colors as $color) {
            $color = \App\Models\ProductColor::create($color);
            if (!$color['is_simple_color']) {
                $color->addMediaFromUrl(ENV('APP_URL') . '/fixed/test/tiger.jpg')
                    ->toMediaCollection('cover');
            }
        }
    }

    public function make_posts()
    {


        $posts = [
            [
                'title' => 'Is Something Missing in Sustainable Fashion?',
                'post_topic_id' => 1,
                'created_at' => '2024-11-18',
                'cover' => '/fixed/test/post-test-1.png',
                'description' => 'The fashion industry evolves rapidly, yet sustainable fashion struggles to captivate consumers. Could this be due to guilt-driven messaging and a failure to make sustainability appealing and desirable?',
                'content' => [["text" => "<p>Fast fashion has settled as the norm in the industry. With brands releasing new collections at an ever-growing speed, consumers are attracted by the promise of purchasing the latest trends at an affordable price. However, this model is built on a foundation of environmental degradation, exploitative labor practices, and massive waste. Despite growing awareness of these issues, the allure of fast fashion remains strong.<br><br>Sustainable fashion, on the other hand, emphasizes ethical production, environmental conservation, and long-lasting quality. But why does it fail to capture the same level of consumer enthusiasm? One key factor might be the way it's marketed. Many sustainable brands rely on guilt-driven messaging, highlighting the severe consequences of fast fashion. While this approach raises awareness, it can also be overwhelming, making sustainability seem like a heavy, unenjoyable obligation.</p>", "title" => "The allure of the Fast and the New Challenges of Fashion"], ["text" => "<p>To bridge this gap, sustainable fashion needs a makeover in its messaging. Instead of focusing strongly on guilt, brands should highlight the positive, aspirational aspects of sustainable fashion. Think luxury, exclusivity, and cutting-edge style that happens to be environmentally friendly. By positioning sustainable choices as desirable and cool, consumers might be more inclined to embrace them.<br><br>Innovation also plays a crucial role. From biodegradable materials to circular fashion models, sustainable fashion can lead the way in creative, forward-thinking designs. Showcasing these innovations can make sustainability feel fresh, exciting, and worthy of consumer investment. Additionally, the development of bioengineered materials, such as mycelium-based materials and algae-based fabrics, is revolutionizing textile production. These innovative materials combine environmental responsibility with cutting-edge textile manufacturing, paving the way for a more sustainable future.&nbsp;<br><br>Technological advancements, such as 3D printing, digital fashion, and virtual try-ons, can also enhance the appeal of sustainable fashion. By tapping into technology, brands<br>can offer personalized shopping experiences, reduce waste, and create a seamless transition between online and offline retail.</p>", "title" => "Innovative Standards"], ["text" => "<p>Education and transparency are critical components in promoting sustainable fashion. Understanding the impact of our choices and how sustainable fashion can contribute to a better future is essential. Brands could potentially invest in educational campaigns to inform consumers about the benefits of sustainable fashion for our well-being, the environment, and society.<br><br>Transparency in supply chains and production processes can also build trust and credibility. By providing clear information about the origins of materials, the conditions of labor, and the impact on the environment and wildlife, brands can empower consumers to make informed decisions. This level of transparency can differentiate sustainable brands from fast fashion and foster a loyal customer base.<br><br>Creating a community around sustainable fashion can make a big impact. Community- driven initiatives, such as sustainable fashion fairs, pop-up events, and workshops, can engage consumers and create a sense of belonging. Encouraging consumers to share their sustainable fashion choices on social media can inspire others and further foster a supportive community.<br><br>In conclusion, while the challenges are significant, they are not insurmountable. By shifting the narrative from guilt to desirability and embracing innovation, sustainable fashion can carve out a more substantial place in the industry. The future of fashion doesn’t just have to be fast; it can be sustainable, stylish, and importantly, seductive.<br><br>Brands that embrace these strategies will not only attract conscious consumers but also set a new standard for the industry. As we move forward, the fashion industry has the opportunity to redefine itself and lead the way towards a more sustainable, ethical, and exciting future.</p>", "title" => "The Importance of Education and Community"]]
            ],
            [
                'title' => 'Apple Leather: Turning Waste into Wearable Innovation',
                'post_topic_id' => 2,
                'created_at' => '2024-10-23',
                'cover' => '/fixed/test/post-test-2.png',
                'description' => 'Made from upcycled apple waste, Apple Leather is a durable, eco-friendly alternative to synthetic and animal leather. It reduces landfill waste, cuts CO2 emissions, and offers a stylish, cruelty-free solution for fashion and beyond.',
                'content' => [["text" => "<p>Fast fashion has settled as the norm in the industry. With brands releasing new collections at an ever-growing speed, consumers are attracted by the promise of purchasing the latest trends at an affordable price. However, this model is built on a foundation of environmental degradation, exploitative labor practices, and massive waste. Despite growing awareness of these issues, the allure of fast fashion remains strong.<br><br>Sustainable fashion, on the other hand, emphasizes ethical production, environmental conservation, and long-lasting quality. But why does it fail to capture the same level of consumer enthusiasm? One key factor might be the way it's marketed. Many sustainable brands rely on guilt-driven messaging, highlighting the severe consequences of fast fashion. While this approach raises awareness, it can also be overwhelming, making sustainability seem like a heavy, unenjoyable obligation.</p>", "title" => "The allure of the Fast and the New Challenges of Fashion"], ["text" => "<p>To bridge this gap, sustainable fashion needs a makeover in its messaging. Instead of focusing strongly on guilt, brands should highlight the positive, aspirational aspects of sustainable fashion. Think luxury, exclusivity, and cutting-edge style that happens to be environmentally friendly. By positioning sustainable choices as desirable and cool, consumers might be more inclined to embrace them.<br><br>Innovation also plays a crucial role. From biodegradable materials to circular fashion models, sustainable fashion can lead the way in creative, forward-thinking designs. Showcasing these innovations can make sustainability feel fresh, exciting, and worthy of consumer investment. Additionally, the development of bioengineered materials, such as mycelium-based materials and algae-based fabrics, is revolutionizing textile production. These innovative materials combine environmental responsibility with cutting-edge textile manufacturing, paving the way for a more sustainable future.&nbsp;<br><br>Technological advancements, such as 3D printing, digital fashion, and virtual try-ons, can also enhance the appeal of sustainable fashion. By tapping into technology, brands<br>can offer personalized shopping experiences, reduce waste, and create a seamless transition between online and offline retail.</p>", "title" => "Innovative Standards"], ["text" => "<p>Education and transparency are critical components in promoting sustainable fashion. Understanding the impact of our choices and how sustainable fashion can contribute to a better future is essential. Brands could potentially invest in educational campaigns to inform consumers about the benefits of sustainable fashion for our well-being, the environment, and society.<br><br>Transparency in supply chains and production processes can also build trust and credibility. By providing clear information about the origins of materials, the conditions of labor, and the impact on the environment and wildlife, brands can empower consumers to make informed decisions. This level of transparency can differentiate sustainable brands from fast fashion and foster a loyal customer base.<br><br>Creating a community around sustainable fashion can make a big impact. Community- driven initiatives, such as sustainable fashion fairs, pop-up events, and workshops, can engage consumers and create a sense of belonging. Encouraging consumers to share their sustainable fashion choices on social media can inspire others and further foster a supportive community.<br><br>In conclusion, while the challenges are significant, they are not insurmountable. By shifting the narrative from guilt to desirability and embracing innovation, sustainable fashion can carve out a more substantial place in the industry. The future of fashion doesn’t just have to be fast; it can be sustainable, stylish, and importantly, seductive.<br><br>Brands that embrace these strategies will not only attract conscious consumers but also set a new standard for the industry. As we move forward, the fashion industry has the opportunity to redefine itself and lead the way towards a more sustainable, ethical, and exciting future.</p>", "title" => "The Importance of Education and Community"]]
            ]

        ];

        foreach ($posts as $post) {
            $newPost = \App\Models\Post::create([
                'title' => $post['title'],
                'description' => $post['description'],
                'post_topic_id' => $post['post_topic_id'],
                'content' => $post['content'],
                'custom_created_at' => $post['created_at']
            ]);
            $newPost->addMediaFromUrl(ENV('APP_URL') . $post['cover'])
                ->toMediaCollection('cover');
        }
    }

    public function run(): void
    {
        $file = new Filesystem;
        $file->cleanDirectory(storage_path('app/public/media'));
        UserAddress::create([
            'user_id' => 1,
            'name' => 'Sister’s house',
            'address' => 'Via del Conservatorio',
            'city' => 'Rome',
            'apartment' => '5678',
            'postal_code' => '00186',
            'country' => 'Italy',
        ]);
        UserAddress::create([
            'user_id' => 1,
            'name' => 'My house',
            'address' => 'Via di S. Giovanni in Laterano',
            'city' => 'Roma RM',
            'apartment' => '85/3',
            'postal_code' => '00186',
            'country' => 'Italy',
        ]);

        foreach ($this->brands as $brand) {
            \App\Models\Brand::create(['name' => $brand]);
        }
        foreach ($this->categories as $category) {
            $new_cateogry = Category::create(['name' => $category['name']]);
            $new_cateogry->addMediaFromUrl(ENV('APP_URL') . $category['img'])
                ->toMediaCollection('cover');
            if ($category['subcategories'] ?? null) {
                foreach ($category['subcategories'] as $subcategory) {
                    Subcategory::create(['name' => $subcategory, 'category_id' => $new_cateogry['id']]);
                }
            }
        }

        $products = [
            [
                'attributes' => [
                    'name' => 'Rachel Mule',
                    'slug' => 'rachel-mule',
                    'brand_id' => 1,
                    'category_id' => 6,
                    'subcategory_id' => null,
                    'designers' => json_encode(['Alex', 'John', 'Emily']),
                    'gender' => 'Menswear',
                    'label' => ['Vegan Brand'],
                ],
                'img_1' => ENV('APP_URL') . "/fixed/test/product-1_1.png",
                'img_2' => ENV('APP_URL') . "/fixed/test/product-1_2.png"
            ],
            [
                'attributes' => [
                    'name' => "Men's Light Coat",
                    'slug' => 'mens-light-coat',
                    'brand_id' => 2,
                    'category_id' => 4,
                    'subcategory_id' => null,
                    'designers' => json_encode(['Alex', 'John', 'Emily']),
                    'gender' => 'Womenswear',
                    'label' => ['Recycled Materials', 'Customizable'],
                ],
                'img_1' => ENV('APP_URL') . "/fixed/test/product-2_1.png",
                'img_2' => ENV('APP_URL') . "/fixed/test/product-2_2.png"
            ],
            [
                'attributes' => [
                    'name' => "Jill Mid",
                    'slug' => 'jill-mid-jasper',
                    'brand_id' => 1,
                    'category_id' => 6,
                    'subcategory_id' => null,
                    'designers' => json_encode(['Alex', 'John', 'Emily']),
                    'gender' => 'Womenswear',
                    'label' => ['Recycled Materials'],
                ],
                'img_1' => ENV('APP_URL') . "/fixed/test/product-3_1.png",
                'img_2' => ENV('APP_URL') . "/fixed/test/product-3_2.png"
            ],
        ];
        for ($i = 0; $i < 6; $i++) {
            foreach ($products as $product) {
                $general_attrs = [
                    'exclusive' => Arr::random(Constant::EXCLUSIVE),
                    'customization_options' => Arr::random(Constant::CUSTOMMIZATION_OPTIONS),
                    'material_focus' => Arr::random(Constant::MATERIAL_FOCUS),
                    'availability' => null,
                    'details' => 'Details for product ',
                    'materials' => 'Materials for product ',
                    'aftercare' => 'Aftercare instructions for product ',
                    'manufacturing' => 'Manufacturing details for product ',
                    'is_active' => true,
                    'price' => rand(100, 1000),
                ];
                $product['attributes']['slug'] = Str::slug($product['attributes']['slug'] . '-' . uniqid());
                $total_attrs = array_merge($product['attributes'], $general_attrs);
                $new_product = Product::create($total_attrs);
                $new_product->addMediaFromUrl($product['img_1'])
                    ->toMediaCollection('examples');
                $new_product->addMediaFromUrl($product['img_2'])
                    ->toMediaCollection('examples');
            }
        }

        $this->make_post_topics();
        $this->make_posts();
        $this->make_colors();
        (new UserAndRoles())->run();
    }
}

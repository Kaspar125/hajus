<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customImages = ['kupsis.jpg', 'kook.jpg', 'pitsa.jpg', 'kommid.jpg', 'leib.jpg', 'vahvel.jpg'];
        $randomImageKey = array_rand($customImages);
        $selectedImage = $customImages[$randomImageKey];
        return [
            'product_name' => $this->faker->word,
            'product_description' => $this->faker->text,
            'photo' => $selectedImage,
            'price' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}

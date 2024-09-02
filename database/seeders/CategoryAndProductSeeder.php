<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryAndProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Mie / Wonton'=>[
                ['name'=>'Mie Kwa Bawang','price'=>30],
                ['name'=>'Mie Kwa Singapore','price'=>32],
                ['name'=>'Mie Sechuan Mala','price'=>32],
                ['name'=>'Wonton Kwa Kaldu','price'=>27],
                ['name'=>'Wonton Sechuan','price'=>30],
                ['name'=>'Wonton Kwa Singapore','price'=>30],
            ],
            'Nasi'=>[
                // ['name'=>'Egg Fried Rice','price'=>6],
                // ['name'=>'Shrimp Fried Rice','price'=>8],
                // ['name'=>'Orange Chicken','price'=>7],
                // ['name'=>'Hainanese Chicken','price'=>9],
                ['name'=>'Nasi Telor Pontianak','price'=>27],
                ['name'=>'Nasi Ayam Lemak Ciamso','price'=>30],
                ['name'=>'Nasi Ayam Hainan','price'=>30],
                ['name'=>'Nasi Kare Kalimantan','price'=>32],
                ['name'=>'Nasi Ayam Sechuan','price'=>32],
                ['name'=>'Nasi Daging Sechuan','price'=>35],
                ['name'=>'Nasi Ngohiong Ayam','price'=>32],
                ['name'=>'Nasi Ngohiong Daging','price'=>35],

            ],
            'Kudapan'=>[
                ['name'=>'Telor Setengah Matang','price'=>18],
                ['name'=>'Gyoza','price'=>24],
                ['name'=>'Pisang Cantik','price'=>24],
                ['name'=>'Lumpia','price'=>24],
                ['name'=>'Wonton Goreng','price'=>24],
                ['name'=>'Bola-Bola Naga','price'=>24],
                ['name'=>'Siomay Ayam','price'=>24],
                ['name'=>'Siomay Mozarella','price'=>24],
                ['name'=>'Tim Tahu','price'=>24],
                ['name'=>'Pao Pasir Mas','price'=>24],
                ['name'=>'Kentang Goreng','price'=>24],
            ],
            'Kopi'=>[
                ['name'=>'Kopi O PANAS','price'=>17],
                ['name'=>'Kopi O DINGIN','price'=>20],
                ['name'=>'Kopi Tubruk','price'=>17],
                ['name'=>'Kopi Susu PANAS','price'=>20],
                ['name'=>'Kopi Susu DINGIN','price'=>22],
                ['name'=>'Kopi Butter','price'=>22],
                ['name'=>'Kopi Rhum PANAS','price'=>22],
                ['name'=>'Kopi Rhum DINGIN','price'=>24],
            ],
            'Non Kopi'=>[
                ['name'=>'Es Orson','price'=>20],
                ['name'=>'Es Setrop','price'=>24],
                ['name'=>'Markisa Ais','price'=>22],
                ['name'=>'Soda Gembira','price'=>26],
                ['name'=>'Badak','price'=>24],
            ],
            'Soeklat'=>[
                ['name'=>'Soeklat Djadoel PANAS','price'=>22],
                ['name'=>'Soeklat Djadoel DINGIN','price'=>24],
                ['name'=>'Soeklat Rhum PANAS','price'=>22],
                ['name'=>'Soeklat Rhum DINGIN','price'=>26],
                ['name'=>'Milo Melayu PANAS','price'=>24],
                ['name'=>'Milo Melayu DINGIN','price'=>26],
            ],
        ];
        foreach($categories as $categoryName => $products){
            $category=Category::create([
                'name'=>$categoryName
            ]);
            foreach($products as $product){
                $category->products()->create($product);
            }
        }
    }
}

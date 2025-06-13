<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    public $categories = [ 'Abbigliamento' , 'Console', 'Elettrodomestici', 'Giocattoli', 'Auto', 'Giardinaggio', 'Sport', 'Libri','Gioielli', 'Cucina'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->categories as $category){
            Category::create([
                'name' => $category
            ]);
        }
    }
}

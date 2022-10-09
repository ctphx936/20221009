<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'tagname' => '家事',
        ];
        Tag::create($param);
        $param = [
            'tagname' => '勉強',
        ];
        Tag::create($param);
        $param = [
            'tagname' => '運動',
        ];
        Tag::create($param);
        $param = [
            'tagname' => '食事',
        ];
        Tag::create($param);
        $param = [
            'tagname' => '移動',
        ];
        Tag::create($param);


    }
}

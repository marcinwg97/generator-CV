<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jezyki_obce')->insert([
            'id' => 1,
            'jezyk' => 'angielski',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 2,
            'jezyk' => 'angielski',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 3,
            'jezyk' => 'angielski',
            'poziom' => 'zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 4,
            'jezyk' => 'hiszpański',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 5,
            'jezyk' => 'hiszpański',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 6,
            'jezyk' => 'hiszpański',
            'poziom' => 'zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 7,
            'jezyk' => 'niemiecki',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 8,
            'jezyk' => 'niemiecki',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 9,
            'jezyk' => 'niemiecki',
            'poziom' => 'zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 10,
            'jezyk' => 'francuski',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 11,
            'jezyk' => 'francuski',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 12,
            'jezyk' => 'francuski',
            'poziom' => 'zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 13,
            'jezyk' => 'włoski',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 14,
            'jezyk' => 'włoski',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 15,
            'jezyk' => 'włoski',
            'poziom' => 'zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 16,
            'jezyk' => 'szwedzki',
            'poziom' => 'podstawowy',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 17,
            'jezyk' => 'szwedzki',
            'poziom' => 'średnio-zaawansowany',
        ]);
        DB::table('jezyki_obce')->insert([
            'id' => 18,
            'jezyk' => 'szwedzki',
            'poziom' => 'zaawansowany',
        ]);
    }
}

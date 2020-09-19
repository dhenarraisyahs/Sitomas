<?php

use Illuminate\Database\Seeder;
use App\Emas;
use App\Mahkota;
use App\Cabinet;
use App\Categories;
use App\Customer;
use App\Pengaturan;
use App\Fund;
use App\PricesEmas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EmasSeeder::class);
        $this->call(MahkotasSeeder::class);
        $this->call(CabinetsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PengaturanSeeder::class);
        $this->call(FundSeeder::class);
        $this->call(PricesEmasSeeder::class);
    }
}


class UserSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'name'  => 'SiToMas',
            'email' => 'sitomas@admin.app',
            'password'  => bcrypt('admin0987')
        ]);
    }
}


class EmasSeeder extends Seeder
{
    public function run()
    {
        DB::table('emas')->delete();

        $data = array(
            array('name' => '24 karat','kadar' => '99.99'),
            array('name' =>'22 karat','kadar' => '91.6'),
            array('name' => '21 karat','kadar' => '87.5'),
            array('name' => '20 karat','kadar' => '83.3'),
            array('name'     => '18 carat ','kadar' => '75.0'),
            array('name'     => '10 carat','kadar' => '41.7'),
            array('name'     => '9 carat','kadar' => '37.5'),
          );
        Emas::insert($data);
    }
}

class MahkotasSeeder extends Seeder
{
    public function run()
    {
        DB::table('mahkotas')->delete();

        $data = array(
                        array('name'         => 'D-F Colourless',
            'type'         => 'Berlian',
            'sertificate'     => 'GIA-98513'),
                        array('name'         => 'G-F Near Colourless',
            'type'         => 'Berlian',
            'sertificate'     => 'GIA-84513'
            ),
                        array('name'         => 'N-R Light Yellow',
            'type'         => 'Berlian',
            'sertificate'     => 'GIA-56145'),
                        array('name'         => 'Z-S Light Yellow',
            'type'         => 'Berlian',
            'sertificate'     => 'GIA-10672'),
                        array('name'         => 'Bright Green Shimmer',
            'type'         => 'Jade',
            'sertificate'     => '-'),
                        array('name'         => 'Blue Stone',
            'type'         => 'Jade',
            'sertificate'     => '-'),
                        array(
            'name'         => 'Red Coral',
            'type'         => 'Ruby',
            'sertificate'     => '-'
            ),
          );
        Mahkota::insert($data);
    }
}

class CabinetsSeeder extends Seeder
{
    public function run()
    {
        DB::table('cabinets')->delete();

        $data = array(
            array('name' => 'A1 Glass Cabinet'),
            array('name' =>'A2 Front Cabinet'),
            array('name' => 'C3 Safe'),
          );
        Cabinet::insert($data);
    }
}

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_categories')->delete();

        $data = array(
            array('name' => 'Cincin'),
            array('name' =>'Kalung'),
            array('name' => 'Anting - Anting'),
          );
        Categories::insert($data);
    }
}

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->delete();

        $data = array(
            array('name' => 'Customer 1','nohp' => '0247624113','alamat' => 'puri anjas 10'),
            array('name' => 'Customer 2','nohp' => '0867921214','alamat' => 'Perum. Atlas No.3'),
            array('name' => 'Customer 3','nohp' => '0243241133','alamat' => 'puri anjas 12'),
            array('name' => 'Customer 4','nohp' => '0857323145','alamat' => 'Perum. Atlas No.19'),
            array('name' => 'Customer 5','nohp' => '0868326134','alamat' => 'Perum. Atlas No.6'),
          );
        Customer::insert($data);
    }
}

class PengaturanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengaturan')->delete();

        $data = array(
            array('name' => 'Nama Toko','alamat' => 'Alamat Anda','notel' => 'no tel anda',
                    'email' => 'email anda','subtext' => 'sub text jika ada', 'gambar' => 'gambar')
          );
        Pengaturan::insert($data);
    }
}

class FundSeeder extends Seeder
{
    public function run()
    {
        DB::table('balances')->delete();

        $data = array(
            array('name' => 'Kas Besar','nominal' => '12000000'),
          );
        Fund::insert($data);
    }

    
}

class PricesEmasSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices_emas')->delete();

        $data = array(
            array('persen' => '2'),
          );
        PricesEmas::insert($data);
    }

    
}
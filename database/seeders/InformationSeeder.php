<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::create([
            'name' => 'company_name',
            'label' => 'Nama Perusahaan',
            'value' => 'PT. Dwipa Nusantara Niaga',
            'type' => 'text',
        ]);

        Information::create([
            'name' => 'email',
            'label' => 'Email',
            'value' => 'info@dwipanusantaraniaga.id',
            'type' => 'text',
        ]);

        Information::create([
            'name' => 'phone',
            'label' => 'Telepon',
            'value' => '+622983539040',
            'type' => 'text',
        ]);

        Information::create([
            'name' => 'whatsapp',
            'label' => 'Whatsapp',
            'value' => '+6285117225313',
            'type' => 'text',
        ]);

        Information::create([
            'name' => 'instagram',
            'label' => 'Instagram',
            'value' => 'https://instagram.com/dwipanusantaraniaga',
            'type' => 'url',
        ]);

        Information::create([
            'name' => 'facebook',
            'label' => 'Facebook',
            'value' => 'https://facebook.com/dwipanusantaraniaga',
            'type' => 'url',
        ]);

        Information::create([
            'name' => 'twitter',
            'label' => 'Twitter',
            'value' => 'https://x.com/dwipanusantaraniaga',
            'type' => 'url',
        ]);

        Information::create([
            'name' => 'linkedin',
            'label' => 'Linkedin',
            'value' => 'https://linkedin.com/dwipanusantaraniaga',
            'type' => 'url'
        ]);
    }
}

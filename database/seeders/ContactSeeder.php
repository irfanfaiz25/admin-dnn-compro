<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => 'Jl. Raya Karanggede - Kedungjati, Dusun I, Kebonan, Kec. Karanggede, Kabupaten Boyolali, Jawa Tengah 57381',
            'phone' => '0298-3539-040',
            'whatsapp' => '+62851-1722-5313',
            'email' => 'info@dwipanusantaraniaga.id',
            'weekday_open' => 'Senin - Jumat: 08.00 - 16.00',
            'weekend_open' => 'Sabtu: 08.00 - 12.00',
        ]);
    }
}

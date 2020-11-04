<?php

use Illuminate\Database\Seeder;
use App\Contact;
use Faker\Generator as Faker;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newContact = new Contact();
            $newContact->name = $faker->firstName;
            $newContact->surname = $faker->lastName;
            $newContact->mail = $faker->email;
            $newContact->phone = $faker->phoneNumber;
            $newContact->address = $faker->address;
            $newContact->city = $faker->city;
            $newContact->postal_code = $faker->postcode;
            $newContact->save();
        }

    }
}

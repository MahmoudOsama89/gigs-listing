<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\listing;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(5)->create();
         $user = User::create(["name"=>"Mahmoud Osama",
            "email"=>"mahmoud@mahmoud.com",
            "password"=>bcrypt(123456)
        ]);
         /*Listing::create([
            "title"=>"Laravel Senior Developer",
            "tags"=>"laravel,javascript",
            "company"=>"Knowing Wall",
            "location"=>"Helmia, Cairo",
            "email"=>"email@email.com",
            "website"=>"knowingwall.com",
            "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]);
        Listing::create([
           "title"=>"Laravel Junior Developer",
           "tags"=>"laravel,jquery",
           "company"=>"Sello",
           "location"=>"Helmia, Cairo",
           "email"=>"email2@email.com",
           "website"=>"sello@facebook.com",
           "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
       ]);*/
       listing::factory(6)->create(["user_id"=>$user->id]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert(
            [
                [
                    'settings_description'=>'title', 
                    'settings_key'=>'adres', 
                    'settings_value'=>'topkapulandun', 
                    'settings_type'=>'text',  
                    'settings_must'=>'5',   
                    'settings_delete'=>'0',
                    'settings_status'=>'1',               

                ],
                [
                    'settings_description'=>'title2', 
                    'settings_key'=>'adres232', 
                    'settings_value'=>'faitg mahlesi', 
                    'settings_type'=>'text',  
                    'settings_must'=>'2',   
                    'settings_delete'=>'0',
                    'settings_status'=>'1',               

                ],                
                [
                    'settings_description'=>'title3', 
                    'settings_key'=>'adres22222', 
                    'settings_value'=>'topkapulandun', 
                    'settings_type'=>'text',  
                    'settings_must'=>'7',   
                    'settings_delete'=>'0',
                    'settings_status'=>'1',               

                ],                
                [
                    'settings_description'=>'title4', 
                    'settings_key'=>'adres44444', 
                    'settings_value'=>'topkapulandun', 
                    'settings_type'=>'text',  
                    'settings_must'=>'1',   
                    'settings_delete'=>'0',
                    'settings_status'=>'1',               

                ], 
                [
                    'settings_description'=>'title5', 
                    'settings_key'=>'adres', 
                    'settings_value'=>'topkapulandun', 
                    'settings_type'=>'text',  
                    'settings_must'=>'115',   
                    'settings_delete'=>'0',
                    'settings_status'=>'1',               

                ],                [
                    'settings_description'=>'title5asdsad', 
                    'settings_key'=>'adres2222', 
                    'settings_value'=>'topkapulandun213213213', 
                    'settings_type'=>'text',  
                    'settings_must'=>'151',   
                    'settings_delete'=>'1',
                    'settings_status'=>'1',               

                ],                [
                    'settings_description'=>'titl23213e5', 
                    'settings_key'=>'adres5343', 
                    'settings_value'=>'topkapulandun', 
                    'settings_type'=>'text',  
                    'settings_must'=>'131',   
                    'settings_delete'=>'1',
                    'settings_status'=>'1',               

                ]
            ]


        );

    }
}

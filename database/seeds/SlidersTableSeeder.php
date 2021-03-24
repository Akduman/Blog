<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('sliders')->insert(
            [
                [
                    'sliders_title'=>'slider_title01', 
                    'sliders_slug'=>'slider_slug01',  
                    'sliders_content'=>'slider_content01',  
                    'sliders_must'=>'1',
                    'sliders_status'=>'1',               

                ],
                [
                    'sliders_title'=>'slider_title02', 
                    'sliders_slug'=>'slider_slug02',  
                    'sliders_content'=>'slider_content02',  
                    'sliders_must'=>'2',
                    'sliders_status'=>'1',           

                ],                
                [
                    'sliders_title'=>'slider_title03', 
                    'sliders_slug'=>'slider_slug03', 
                    'sliders_content'=>'slider_content03',  
                    'sliders_must'=>'3',
                    'sliders_status'=>'0',                 

                ],                
                [
                    'sliders_title'=>'slider_title04', 
                    'sliders_slug'=>'slider_slug04',
                    'sliders_content'=>'slider_content04',  
                    'sliders_must'=>'4',
                    'sliders_status'=>'0', 
                ], 
                [
                    'sliders_title'=>'slider_title05', 
                    'sliders_slug'=>'slider_slug05', 
                    'sliders_content'=>'slider_content05',  
                    'sliders_must'=>'5',
                    'sliders_status'=>'0',              

                ],                
                [
                    'sliders_title'=>'slider_title06', 
                    'sliders_slug'=>'slider_slug06', 
                    'sliders_content'=>'slider_content06',  
                    'sliders_must'=>'6',
                    'sliders_status'=>'0',           

                ],              
                [
                    'sliders_title'=>'slider_title07', 
                    'sliders_slug'=>'slider_slug07', 
                    'sliders_content'=>'slider_content07',  
                    'sliders_must'=>'7',
                    'sliders_status'=>'1',              

                ]
            ]


        );
    }
}

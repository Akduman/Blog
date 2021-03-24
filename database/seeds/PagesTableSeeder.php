<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('pages')->insert(
            [
                [
                    'pages_title'=>'page_title01', 
                    'pages_slug'=>'page_slug01',  
                    'pages_content'=>'page_content01',  
                    'pages_must'=>'1',
                    'pages_status'=>'1',               

                ],
                [
                    'pages_title'=>'page_title02', 
                    'pages_slug'=>'page_slug02',  
                    'pages_content'=>'page_content02',  
                    'pages_must'=>'2',
                    'pages_status'=>'1',           

                ],                
                [
                    'pages_title'=>'page_title03', 
                    'pages_slug'=>'page_slug03', 
                    'pages_content'=>'page_content03',  
                    'pages_must'=>'3',
                    'pages_status'=>'0',                 

                ],                
                [
                    'pages_title'=>'page_title04', 
                    'pages_slug'=>'page_slug04',
                    'pages_content'=>'page_content04',  
                    'pages_must'=>'4',
                    'pages_status'=>'0', 
                ], 
                [
                    'pages_title'=>'page_title05', 
                    'pages_slug'=>'page_slug05', 
                    'pages_content'=>'page_content05',  
                    'pages_must'=>'5',
                    'pages_status'=>'0',              

                ],                
                [
                    'pages_title'=>'page_title06', 
                    'pages_slug'=>'page_slug06', 
                    'pages_content'=>'page_content06',  
                    'pages_must'=>'6',
                    'pages_status'=>'0',           

                ],              
                [
                    'pages_title'=>'page_title07', 
                    'pages_slug'=>'page_slug07', 
                    'pages_content'=>'page_content07',  
                    'pages_must'=>'7',
                    'pages_status'=>'1',              

                ]
            ]


        );
    }
}

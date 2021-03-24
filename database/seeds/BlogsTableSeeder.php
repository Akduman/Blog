<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert(
            [
                [
                    'blogs_title'=>'blog_title01', 
                    'blogs_slug'=>'blog_slug01',  
                    'blogs_content'=>'blog_content01',  
                    'blogs_must'=>'1',
                    'blogs_status'=>'1',               

                ],
                [
                    'blogs_title'=>'blog_title02', 
                    'blogs_slug'=>'blog_slug02',  
                    'blogs_content'=>'blog_content02',  
                    'blogs_must'=>'2',
                    'blogs_status'=>'1',           

                ],                
                [
                    'blogs_title'=>'blog_title03', 
                    'blogs_slug'=>'blog_slug03', 
                    'blogs_content'=>'blog_content03',  
                    'blogs_must'=>'3',
                    'blogs_status'=>'0',                 

                ],                
                [
                    'blogs_title'=>'blog_title04', 
                    'blogs_slug'=>'blog_slug04',
                    'blogs_content'=>'blog_content04',  
                    'blogs_must'=>'4',
                    'blogs_status'=>'0', 
                ], 
                [
                    'blogs_title'=>'blog_title05', 
                    'blogs_slug'=>'blog_slug05', 
                    'blogs_content'=>'blog_content05',  
                    'blogs_must'=>'5',
                    'blogs_status'=>'0',              

                ],                
                [
                    'blogs_title'=>'blog_title06', 
                    'blogs_slug'=>'blog_slug06', 
                    'blogs_content'=>'blog_content06',  
                    'blogs_must'=>'6',
                    'blogs_status'=>'0',            

                ],              
                [
                    'blogs_title'=>'blog_title07', 
                    'blogs_slug'=>'blog_slug07', 
                    'blogs_content'=>'blog_content07',  
                    'blogs_must'=>'7',
                    'blogs_status'=>'1',              

                ]
            ]


        );
    }
}

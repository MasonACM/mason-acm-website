<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Static_Content extends Eloquent 
{
    protected $guarded = array('id');
    protected $table = 'static_content';

    public static function getPageByTitle($title)
    {
    	return Static_Content::where('title', $title)->first();
    } 

    public static function doesPageExist($title)
    {
    	return Static_Content::where('title', $title)->count() == 1;
    }
}

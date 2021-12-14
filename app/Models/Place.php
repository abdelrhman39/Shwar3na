<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $table = "places";

    public $fillable =['id','name_ar','name_en','logo','cover','description','phone','email','address','latitude','longitude',
                        'price_range','website','Facebook','Twitter','Instagram','WhatsApp','video','views','360Image',
                        'location_id','Category_id','user_id','features','state','created_at','updated_at'];
    public function scopeSelection($query){

        return $query->select('places.id', 'places.name_ar', 'places.name_en', 'places.logo', 'places.cover', 'places.description', 'places.phone', 'places.email', 'places.address', 'places.latitude', 'places.longitude',
                            'places.price_range', 'places.website', 'places.Facebook', 'places.Twitter', 'places.Instagram', 'places.WhatsApp', 'places.video', 'places.views', 'places.360Image as image360',
                            'places.location_id', 'locations.name as location_name' , 'places.Category_id', 'category.name as Category_name' , 'places.user_id', 'places.features', 'places.state', 'places.created_at')
                     ->join('locations' , 'places.location_id' ,'=', 'locations.id')
                     ->join('category' , 'places.Category_id' ,'=', 'category.id');
    }

}

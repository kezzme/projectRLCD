<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $primaryKey = 'uid';
    protected $fillable = [
        'car_year', 
        'car_make', 
        'car_model', 
        'car_variant', 
        'image', 
        'description', 
        'car_price', 
        'car_plate_no', 
        'engine', 
        'transmission', 
        'fuel',
        'odometer',
        'interior_color',
        'exterior_color',
        'drive_train', 
        'body_type',
        'no_of_owners', 
        'unit_type', 
        'display_image_1', 
        'display_image_2', 
        'display_image_3', 
        'display_image_4', 
        'display_image_5',
        'display_image_6',
        'display_image_7',
        'display_image_8',
        'display_image_9',
    ];

    
}

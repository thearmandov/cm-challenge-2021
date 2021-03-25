<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $fillable = [
        'first_name', 
        'last_name',
        'shop_category',
        'portfolio_link',
        'portfolio_confirmation',
        'online_stores',
        'quality_perspective',
        'online_sales_experience',
        'business_marketing_experience'
    ];

    // Lets check and see if the user already submitted a portfolio. 
    public function getExistingPortfolio($portfolio_link)
    {
        return $this->where('portfolio_link', $portfolio_link)->exists();
    }
}

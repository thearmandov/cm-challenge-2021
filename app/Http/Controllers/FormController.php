<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomFormRequest;

class FormController extends Controller
{
    // All validation rules and messages are handled via a custom form request
    // located in app\Http\Requests\CustomFormRequest.php
    public function process_form(CustomFormRequest $request)
    {
        

        $seller = Seller::create([
            'first_name' => $request->firstName, 
            'last_name' => $request->lastName,
            'shop_category' => $request->shopCategory,
            'portfolio_link' => $request->portfolioLink,
            'portfolio_confirmation' => $request->confirmAuthor === 'true' ? 1 : 0,
            'online_stores' => $request->listOfStores,
            'quality_perspective' => $request->qualityPerspective,
            'online_sales_experience' => $request->onlineSalesExperience,
            'business_marketing_experience' => $request->businessMarketingExp
        ]);

        if ($seller) {
            return response()->json([
                    'success' => true,
                    'message' => 'Seller successfully saved.'
                ]);
        }
    }

    public function getQualityPerspectiveOptions()
    {
        $options = [
            "I don't care what it takes, my products are the highest quality possible",
            "I put in enough effort to make my product pretty high quality, but at some point my time is better spent elsewhere",
            "I try to get quality products out quickly, even if I need to take a shortcut now and then",
            "I spend the minimum amount of time & effort it takes to create products that are acceptable quality.",
            "Quantity is more important to me than quality.",
        ];

        return response()->json([
            'status' => 1,
            'options' => $options
        ]);
    }

    public function getOnlineSalesExperienceOptions()
    {
        $options = [
            "I sell on multiple marketplaces and through my own website",
            "I have experience selling through only my own website",
            "I have experience selling through multiple marketplaces",
            "I have experience selling through one online marketplace",
            "I'm new to selling creative products online",
        ];

        return response()->json([
            'status' => 1,
            'options' => $options
        ]);
    }

    public function getBusinessMarketingExpOptions()
    {
        $options = [
            "I have an extensive background in business and/or marketing",
            "I'm familiar with some skill & techniques, but I'm not sure how to apply them when selling my creative work",
            "I'm vaguely aware of basic business & marketing concepts",
            "I'm not interested in understanding business & marketing",
        ];

        return response()->json([
            'status' => 1,
            'options' => $options
        ]);
    }

}

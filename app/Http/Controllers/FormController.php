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
}

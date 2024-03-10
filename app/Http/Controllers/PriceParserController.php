<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subscription;
use App\Service\OLXParserService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PriceParserController extends Controller
{
    /**
     * @param Request $request
     * @param OLXParserService $service
     * @return RedirectResponse
     * @throws GuzzleException
     */
    public function __invoke(Request $request, OLXParserService $service) :RedirectResponse
    {
        $product =  Product::firstOrCreate($service->olxParser($request->url));

        $subscription = Subscription::firstOrCreate([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
        ]);

        Artisan::call('check:prices', ['subscription' => $subscription]);

        return redirect()->back();
    }
}

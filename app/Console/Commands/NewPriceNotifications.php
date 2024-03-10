<?php

namespace App\Console\Commands;

use App\Mail\NewPriceMail;
use App\Mail\SubscriptionMail;
use App\Models\Product;
use App\Models\Subscription;
use App\Models\User;
use App\Service\OLXParserService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NewPriceNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Price OLX';

    /**
     * Execute the console command.
     */
    public function handle(OLXParserService $service)
    {
        $subscriptions = Subscription::all();

        foreach ($subscriptions as $subscription) {
            $newProduct = $service->olxParser(Product::find($subscription->product_id)->url);
            $oldProduct = Product::find($subscription->product_id);

            if ($newProduct['price'] != $oldProduct->price) {
                $oldProduct->update($newProduct);

                Mail::to(User::find($subscription->user_id))->send(new NewPriceMail($oldProduct));
            }
        }
    }
}

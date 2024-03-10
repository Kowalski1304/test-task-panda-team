<?php

namespace App\Console\Commands;

use App\Mail\SubscriptionMail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SubscriptionNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:prices {subscription}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check prices of advertisements and notify subscribers about price changes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscription = $this->argument('subscription');
        $product = Product::find($subscription->product_id);

        Mail::to(User::find($subscription->user_id)->get('email'))->send(new SubscriptionMail($product));

        $this->info('Prices checked successfully.');
    }
}

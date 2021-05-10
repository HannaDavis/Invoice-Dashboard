<?php

namespace App\Providers;

use App\Events\InvoiceCreated;
use App\Listeners\SendInvoiceNotification;
use App\Models\Client;
use App\Models\Invoice;
use App\Observers\ClientObserver;
use App\Observers\InvoiceObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(InvoiceCreated::class, [SendInvoiceNotification::class, 'handle']);
          Event::listen(function (InvoiceCreated $event) {
            //
        });
        Invoice::observe(InvoiceObserver::class);
        Client::observe(ClientObserver::class);
    }
}

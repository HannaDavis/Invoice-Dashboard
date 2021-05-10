<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\NewClientPendingTasks;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function created(Client $client)
    {
        $NewClientPendingTasks = new NewClientPendingTasks();
        $NewClientPendingTasks->client_id = $client->id;
        $NewClientPendingTasks->awaiting_assignment = true;
        $NewClientPendingTasks->save();
    }

    /**
     * Handle the Client "updated" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function updated(Client $client)
    {
        //
    }

    /**
     * Handle the Client "deleted" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function deleted(Client $client)
    {
        //
    }

    /**
     * Handle the Client "restored" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}

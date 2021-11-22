<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRetrieved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Retrieved User.
     *
     * @var 
     */
    private $user;

    /**
     * Load user data from sessión.
     *
     * @return void
     */
    private function loadServiceData()
    {
    
        # Determina el usuario autenticado que debe de buscar.
        if ($this->user->isWorker())
        {
            # No carga a los usuarios si el resultado es nulo.
            if (session('workers') === null)
                return;

            $worker = session('workers')
                ->where('id', $this->user->id)
                ->where('user_type', $this->user->type)
                ->first() ?? [];

            if (count($worker) > 0)
            {
                $this->user->fill($worker);
                $this->user->type = $worker['user_type'];
            }
        }
        else if ($this->user->isAppliant())
        {
            if (session('appliants') === null)
                return;

            $appliant = session('appliants')
                ->where('id', $this->user->id)
                ->where('user_type', $this->user->type)
                ->first() ?? [];

            if (count($appliant) > 0)
            {
                $this->user->fill($appliant);
                $this->user->type = $appliant['user_type'];
                $this->user->birth_country = $appliant['nationality'];
                $this->user->residence_country = $appliant['residence'];
            }
        }
    }

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->loadServiceData();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

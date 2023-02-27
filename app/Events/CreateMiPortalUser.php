<?php

namespace App\Events;

use App\Helpers\MiPortalService;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatingMiPortalUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The data that will be used to create the user
     * 
     * @var array
     */
    private $data;

    /**
     * Consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\MiPortalService
     */
    private $miPortalService;

    /**
     * Consume al proovedor de servicios de zoom.
     *
     * @var \Illuminate\Http\Client\Response;
     */
    private $searchUserResponse;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->miPortalService = new MiPortalService;
        $this->searchUserResponse = $this->miPortalService->miPortalGet('api/usuarios', ['filter[email]' => $data['email']]);
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

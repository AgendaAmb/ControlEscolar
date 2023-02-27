<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ElapsedDay
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('');
        Log::info('Un día acaba de transcurrir. Se llevarán a cabo las siguientes tareas:');
        Log::info('1.- Verificar si se abre / cierra la convocatoria de Maestría en ciencias ambientales.');
        Log::info('2.- Verificar si se abre / cierra la convocatoria de Maestría interdisciplinaria en ciudades sostenibles.');
        Log::info('3.- Verificar si se abre / cierra la convocatoria de Maestría en ciencias ambientales, doble titulación.');
        Log::info('4.- Verificar si se abre / cierra la convocatoria de Doctorado en ciencias ambientales.');
        Log::info('Fin');
        Log::info('');
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

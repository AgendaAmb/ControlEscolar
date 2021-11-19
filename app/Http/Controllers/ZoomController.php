<?php

namespace App\Http\Controllers;

use App\Helpers\ZoomService;
use App\Http\Requests\CreateMeetingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Interview;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class ZoomController extends Controller
{
    # Tipos de reunión.
    private const MEETING_TYPE_INSTANT = 1;
    private const MEETING_TYPE_SCHEDULE = 2;
    private const MEETING_TYPE_RECURRING = 3;
    private const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
         
    /**
     * Ruta para las reniones programadas con la cuenta del PMPCA.
     * 
     * @var string
     */
    private const USER_MEETINGS_URL = 'users/me/meetings';

    /**
     * Ruta para las reniones programadas con la cuenta del PMPCA.
     * 
     * @var string
     */
    private const MEETINGS_URL = 'meetings/';

    /**
     * El controlador consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\ZoomService
     */
    private $zoomService;

    public function __construct()
    {
        $this->zoomService = new ZoomService;
    }
        
    /**
     * Enlista todas las reuniones de zoom.
     * 
     * @param Request $request
     */
    public function index(): JsonResponse
    {
        # Obtiene el listado de reuniones.
        $response = $this->zoomService->zoomGet(self::USER_MEETINGS_URL, ['page_size' => 300]);
        
        # Recolecta el resultado.
        $data = $response->collect();
    
        # Devuelve el resultado
        return new JsonResponse($data, $response->status());
    }

    /**
     * Genera una nueva reunión de zoom.
     * 
     * @param CreateMeetingRequest $request
     **/
    public function store($request)
    {

         /**Creacion de formato de fecha checar hora de inicio por que lo esta poniendo mal, al parecer 
          * la esta poniendo en utc 5
          Ver tambien que onda el formato en que se esta recibiendo la hora por que no se si esta en formato 24 o 12 
          **/
        
        $star_time=$request->date.'T'.$request->start_time;
        $end=$request->date.'T'.$request->end_time;
        $FechaStar= Carbon::createFromDate($star_time)->subHour(6);
        $FechaEnd=Carbon::createFromDate($end)->subHour(6);
       
        $Duration= $FechaStar->diffInMinutes($FechaEnd);
        

        $data['type'] = self::MEETING_TYPE_SCHEDULE;
        $data['timezone'] = "America/Mexico_City";
        $data['start_time'] =  $FechaStar;
        $data['duration'] = $Duration;
        $data['topic'] = "Reunion doctorado";
       
        $response =$this->zoomService->zoomPost(self::USER_MEETINGS_URL, $data);
    
        # Devuelve el resultado
        return $response->collect();
    }

    /**
     * Obtiene los detalles de una reunión de zoom.
     * 
     * @param string $id
     **/
    public function show(string $id) 
    {
        # Obtiene el listado de reuniones.
        $response = $this->zoomService->zoomGet(self::MEETINGS_URL.$id);
                
        # Recolecta el resultado.
        $data = $response->collect();

        # Devuelve el resultado
        return new JsonResponse($data, $response->status());
    }

    /**
     * Actualiza una reunión.
     * 
     * @param Request $request
     **/
    public function update(Request $request, string $id) 
    {
        $data = $request->validated();
        $data['type'] = self::MEETING_TYPE_SCHEDULE;
        $data['timezone'] = 'America/Mexico_City';

        $response = $this->zoomService->zoomPatch(self::MEETINGS_URL.$id, $data);
    
        # Devuelve el resultado
        return new JsonResponse($response->collect(), $response->status());
    }

    /**
     * Elimina una reunión.
     * 
     * @param string $id
     **/
    public function delete(string $id) 
    {
        $response = $this->zoomDelete(self::MEETINGS_URL.$id);

        # Devuelve el resultado
        return new JsonResponse($response->collect(), $response->status());
    }
}

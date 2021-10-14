<?php

namespace App\Jobs;

use App\Helpers\MiPortalService;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class AddAppliants implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Postulantes.
     *
     * @var object
     */
    private $appliants;

    /**
     * Consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\MiPortalService
     */
    private $miPortalService;

    /**
     * Columnas a recuperar.
     *
     * @var array
     */
    private $columns = [
        'email', 
        'Nombres as name', 
        'PrimerApellido as middlename', 
        'SegundoApellido as surname',
        'Curp as curp',
        'Genero as gender',
        'Pais.nombre as nationality',
        'Pais.nombre as residence',
        'FechaNacimiento as birth_date',
        'Estado.Nombre as birth_state',
        'CorreoAlterno as altern_email',
        'Telefono as phone_number',
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->miPortalService = new MiPortalService;
        $this->columns[] = DB::raw("'externs' as type");
        $this->columns[] = DB::raw("'Estudiante' as ocupation");
        $this->columns[] = DB::raw("NULL as disability");
        $this->columns[] = DB::raw("false as is_disabled");
        $this->columns[] = DB::raw("'imarec2022' as password");
        $this->columns[] = DB::raw("'imarec2022' as rpassword");
        $this->columns[] = DB::raw("78000 as zip_code");

        $this->appliants = DB::connection('ceviejo')
            ->table('Usuario')
            ->select($this->columns)
            ->join('Aspirante', 'Aspirante.ClaveAspirante', 'Usuario.user_id')
            ->join('Pais', 'Pais.ClavePais', 'Aspirante.PaisNacimiento')
            ->join('Estado', 'Estado.ClaveEstado', 'Aspirante.EstadoNacimiento')
            ->where('user_type', 'App\\Models\\Aspirante')
            ->get();

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->appliants as $appliant)
        {
            $data = collect($appliant)->except('birth_state')->toArray();
            $data['gender'] = $appliant->gender === 'F' ? 'Femenino' : 'Masculino';
            $data['module_id'] = env('MIPORTAL_MODULE_ID');
            $data['is_disabled'] = $appliant->is_disabled !== 0;
            $data['pertenece_uaslp'] = false;

            $search_user_response = $this->miPortalService->miPortalGet('api/usuarios', ['filter[email]' => $appliant->email]);

            $role = ($appliant->birth_state === 'San Luis Potosí' 
            ? 'aspirante_local' 
            :  $appliant->birth_country === 'México')
            ?  'aspirante_foraneo'
            :  'extranjero';

            if ($search_user_response->collect()->count() === 0)
            {
                $add_user_response = $this->miPortalService->miPortalPost('api/usuarios', $data);
                $response_data = $add_user_response->collect();
                dd($response_data);
                $appliant_model = User::firstOrCreate([
                    'id' => $response_data['id'],
                    'type' => $response_data['user_type'],
                    'birth_state' => $appliant->birth_state,
                    'marital_state' => 'Soltero'
                ]);

                $appliant_model->syncRoles([$role]);


                $this->miPortalService->miPortalPost('api/usuarios/modulos', [
                    'module_id' => env('MIPORTAL_MODULE_ID'),
                    'user_id' => $appliant_model->id,
                    'user_type' => $appliant_model->type,
                ]);
            }
            else
            {
                $response_data = $search_user_response->collect()[0];
                $appliant_model = User::firstOrCreate([
                    'id' => $response_data['id'],
                    'type' => $response_data['user_type'],
                    'birth_state' => $appliant->birth_state,
                    'marital_state' => 'Soltero'
                ]);

                $appliant_model->syncRoles([$role]);


                $this->miPortalService->miPortalPost('api/usuarios/modulos', [
                    'module_id' => env('MIPORTAL_MODULE_ID'),
                    'user_id' => $appliant_model->id,
                    'user_type' => $appliant_model->type,
                ]);
            }

        }
    }
}

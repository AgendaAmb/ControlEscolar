<?php

namespace App\Jobs;

use App\Helpers\MiPortalService;
use App\Models\AcademicArea;
use App\Models\AcademicEntity;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddProfessors implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\MiPortalService
     */
    private $miPortalService;

    /**
     * Profesores del núcleo básico.
     *
     * @var \Illuminate\Support\Collection
     */
    private $professors;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->miPortalService = new MiPortalService;
        $this->professors = collect([
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>60575],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS','id'=>6358],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>12457],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>17626],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE AGRONOMÍA','id'=>19277],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>10667],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_CIACYT','id'=>19008],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>10873],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>253],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>13325],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>13283],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_COORDINACIÓN ACADÉMICA REGIÓN ALTIPLANO','id'=>18211],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>11370],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>31179],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_CIACYT','id'=>15072],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS QUÍMICAS','id'=>9820],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>23039],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_FACULTAD DE AGRONOMÍA','id'=>15641],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>7082],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>17081],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>99904],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>17239],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>15398],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_CIACYT','id'=>11185],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>9103],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>267],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>11503],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>16667],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_CIACYT','id'=>17005],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>19274],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>2232],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>17568],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>16506],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>29098],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_FACULTAD DE MEDICINA','id'=>7349],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>41074],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_FACULTAD DE AGRONOMÍA','id'=>20511],
            ['type'=>'workers', 'academic_area' => 'Evaluación ambiental', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>18219],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>10571],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>9898],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_FACULTAD DE INGENIERÍA','id'=>12998],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'FACULTAD DE PSICOLOGÍA','id'=>10791],
            ['type'=>'workers', 'academic_area' => 'Salud ambiental integrada', 'academic_entity' => 'UASLP_CIACYT','id'=>23182],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>13675],
            ['type'=>'workers', 'academic_area' => 'Gestión ambiental', 'academic_entity' => 'UASLP_FACULTAD DE CIENCIAS SOCIALES Y HUMANIDADES','id'=>16283],
            ['type'=>'workers', 'academic_area' => 'Recursos naturales renovables', 'academic_entity' => 'UASLP_INSTITUTO DE INVESTIGACIÓN DE ZONAS DESÉRTICAS','id'=>17115],
            ['type'=>'workers', 'academic_area' => 'Prevención y control', 'academic_entity' => 'UASLP_UNIDAD ACADÉMICA MULTIDISCIPLINARIA ZONA HUASTECA','id'=>12088]
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $professors_id = collect($this->professors)->map(fn($v, $k) => $v['id'])->toArray();
        $miPortalResponse = $this->miPortalService->miPortalGet('api/usuarios', [
            'filter[id]' => $professors_id,
            'filter[type]' => 'App\\Models\\Auth\\Worker'
        ]);

        if ($miPortalResponse->failed())
            return;

        $professors = $miPortalResponse->collect()->toArray();

        foreach ($professors as $mi_portal_professor)
        {   
            $professor = $this->professors->firstWhere('id', $mi_portal_professor['id']);

            if ($professor === null)
                continue;

            $academic_area = AcademicArea::firstWhere('name', $professor['academic_area']);
            $academic_entity = AcademicEntity::firstWhere('name', $professor['academic_entity']);

            $professor_model = User::firstOrCreate(collect($professor)->only('id', 'type')->toArray());
            $professor_model->roles()->sync([4 => [ 'model_id' => $professor_model->id, 'model_type' => $professor['type']]]);
            $professor_model->academicAreas()->sync([$academic_area->id => [ 'user_id' => $professor_model->id, 'user_type' => $professor['type']]]);
            $professor_model->academicEntities()->sync([$academic_entity->id => [ 'user_id' => $professor_model->id, 'user_type' => $professor['type']]]);

            $this->miPortalService->miPortalPost('api/usuarios/modulos', [
                'module_id' => env('MIPORTAL_MODULE_ID'),
                'user_id' => $mi_portal_professor['id'],
                'user_type' => $professor['type'],
            ]);
        }
    }
}

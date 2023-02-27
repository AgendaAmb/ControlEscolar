<?php

namespace App\Http\Controllers;

use App\Helpers\MiPortalService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * El controlador consume al proovedor de servicios de zoom.
     *
     * @var \App\Helpers\MiPortalService
     */
    protected $miPortalService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miPortalService = new MiPortalService;
    }
}

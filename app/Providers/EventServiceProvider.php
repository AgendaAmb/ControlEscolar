<?php

namespace App\Providers;

use App\Models\AcademicDegree;
use App\Models\AppliantLanguage;
use App\Models\Archive;
use App\Observers\AcademicDegreeObserver;
use App\Observers\AppliantLanguageObserver;
use App\Observers\ArchiveObserver;
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
        Archive::observe(ArchiveObserver::class);
        AcademicDegree::observe(AcademicDegreeObserver::class);
        AppliantLanguage::observe(AppliantLanguageObserver::class);
    }
}

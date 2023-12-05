<?php

namespace App\Observers;
use App\Models\RequiredDocument;
use App\Models\RecommendationLetterEnrem;

class RecommendationObserver
{
    /**
     * Handle the RecommendationLetterEnrem "created" event.
     *
     * @param  \App\Models\RecommendationLetterEnrem  $recommendationLetterEnrem
     * @return void
     */
    public function created(RecommendationLetterEnrem $recommendationLetterEnrem)
    {
        $required_documents_ids = RequiredDocument::where('type','curricular')->pluck('id');
        $recommendationLetterEnrem->requiredDocuments()->attach($required_documents_ids);
    }

    /**
     * Handle the RecommendationLetterEnrem "updated" event.
     *
     * @param  \App\Models\RecommendationLetterEnrem  $recommendationLetterEnrem
     * @return void
     */
    public function updated(RecommendationLetterEnrem $recommendationLetterEnrem)
    {
        //
    }

    /**
     * Handle the RecommendationLetterEnrem "deleted" event.
     *
     * @param  \App\Models\RecommendationLetterEnrem  $recommendationLetterEnrem
     * @return void
     */
    public function deleted(RecommendationLetterEnrem $recommendationLetterEnrem)
    {
        //
    }

    /**
     * Handle the RecommendationLetterEnrem "restored" event.
     *
     * @param  \App\Models\RecommendationLetterEnrem  $recommendationLetterEnrem
     * @return void
     */
    public function restored(RecommendationLetterEnrem $recommendationLetterEnrem)
    {
        //
    }

    /**
     * Handle the RecommendationLetterEnrem "force deleted" event.
     *
     * @param  \App\Models\RecommendationLetterEnrem  $recommendationLetterEnrem
     * @return void
     */
    public function forceDeleted(RecommendationLetterEnrem $recommendationLetterEnrem)
    {
        //
    }
}

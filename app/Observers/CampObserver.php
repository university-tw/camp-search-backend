<?php

namespace App\Observers;

use App\Models\Camp;

class CampObserver {
    /**
     * Handle the Camp "created" event.
     *
     * @param \App\Models\Camp $camp
     * @return void
     */
    public function created(Camp $camp) {
        //
    }

    /**
     * Handle the Camp "updated" event.
     *
     * @param \App\Models\Camp $camp
     * @return void
     */
    public function updating(Camp $camp) {
        if($camp->isDirty('status')) {
            $id = auth()->id();
            \Log::alert("[Audit] Camp {$camp->id} status changed to {$camp->status} by {$id}");
        }
    }

    /**
     * Handle the Camp "deleted" event.
     *
     * @param \App\Models\Camp $camp
     * @return void
     */
    public function deleted(Camp $camp) {
        //
    }

    /**
     * Handle the Camp "restored" event.
     *
     * @param \App\Models\Camp $camp
     * @return void
     */
    public function restored(Camp $camp) {
        //
    }

    /**
     * Handle the Camp "force deleted" event.
     *
     * @param \App\Models\Camp $camp
     * @return void
     */
    public function forceDeleted(Camp $camp) {
        //
    }
}

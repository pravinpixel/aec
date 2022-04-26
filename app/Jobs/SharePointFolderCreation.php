<?php

namespace App\Jobs;

use App\Http\Controllers\Sharepoint\SharepointController;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class SharePointFolderCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->queueProgress(0);
            $sharePoint = new SharepointController();
            $this->queueProgress(10);
            $sharePoint->create($this->data['path']);
            $this->queueData(['directory' => $this->data['path']]);
            Log::info("folder creation functionality {$this->data['path']}");
            $this->queueProgress(100);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
     
    }
}

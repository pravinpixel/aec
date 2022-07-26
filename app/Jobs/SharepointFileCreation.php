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

class SharepointFileCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;

    protected $url;
    protected $folder;
    protected $fileName;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url, $folder, $fileName)
    {
        $this->url      = $url;
        $this->folder   = $folder;
        $this->fileName = $fileName;
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
            $sharePoint->createFile($this->url,  $this->folder, $this->fileName);
            $this->queueData(['directory' => $this->url.$this->folder.$this->fileName]);
            Log::info("file creation functionality file name{$this->fileName}");
            $this->queueProgress(100);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}

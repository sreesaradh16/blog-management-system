<?php

namespace App\Jobs;

use App\Mail\SendPostCreatedMail;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedJob implements ShouldQueue
{
    use Queueable;

    protected $post;


    /**
     * Create a new job instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('admin@gmail.com')->send(new SendPostCreatedMail($this->post));
    }
}

<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class JobPolicy
{
    public function edit(User $user, Job $job): bool
    {
        Log::info('JobPolicy edit method called', ['job' => $job]);

        return $job->employer->user->is($user);
    }
}

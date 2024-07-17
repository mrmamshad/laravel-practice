<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class CheckJobAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $jobId = $request->route('id');
        $job = Job::find($jobId);

        if (!$job) {
            // Job not found, abort with 404
            return abort(404, 'Job not found');
        }

        // Check if the authenticated user is verified and is the owner of the job

        if($job->employer->user->is(Auth::user())) {
            // User is authorized, proceed with the request
            return $next($request);
        }

        // User is not authorized, abort with 403
        return abort(403, 'Unauthorized action');
    }
}

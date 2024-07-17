<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;


class JobController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $jobs = Job::with('employer')->latest()->get();

    return Inertia::render('Jobs/Index', [
      'jobs' => $jobs
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return Inertia::render('Jobs/Create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $req)
  {
    $req->validate([
      'title' => 'required|min:3',
      'salary' => 'required',
    ]);

    Job::create([
      'title' => request('title'),
      'salary' => request('salary'),
      'employer_id' => $req->user()->id
    ]);

    return redirect('/jobs');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $job = Job::find($id);


    return Inertia::render('Jobs/Show', [
      'job' => $job,
      'id' => $id
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
      $job = Job::findOrFail($id);

      return Inertia::render('Jobs/Edit', [
          'job' => $job,
      ]);
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
      $job = Job::findOrFail($id);

      $request->validate([
          'title' => 'required|min:3',
          'salary' => 'required',
      ]);

      $job->update([
          'title' => $request->input('title'),
          'salary' => $request->input('salary'),
      ]);
      return redirect()->route('jobs.show', ['id' => $job->id]);
  }

  public function destroy(string $id)
  {
      $job = Job::find($id);
      if ($job) {
          $job->delete();
      }
      return response()->json(['redirect' => route('jobs')]);
  }

}

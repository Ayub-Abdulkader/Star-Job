<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', ['jobs' => Job::latest()->filter()->simplePaginate(4)]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // only authorized user have access

    public function listing(Request $request)
    {
        //return $request->user()->jobs;
        return view('listing.index', ['lists' => $request->user()->jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'position' => 'required|min:3',
            'location' => 'required|min:3|max:255',
            'salary' => 'required|numeric',
            'description' => 'required|min:100',
            'website' => 'nullable|min:5|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // validate and attaching tags to jobs 
        $validatedTags = $request->validate([
            'tags' => 'nullable|min:3|max:255',
        ]);

        $tags = explode(',', $validatedTags['tags']);

        $request->user()->jobs()->create($validated)->attachTags($tags);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully'); 

    }

    public function edit(Job $job)
    {
        return view('listing.edit', ['job' => $job]);
        //return $job;
    }
    public function update(Job $job, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'position' => 'required|min:3',
            'location' => 'required|min:3|max:255',
            'salary' => 'required|numeric',
            'description' => 'required|min:100',
            'website' => 'nullable|min:5|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // validate and attaching tags to jobs 
        $validatedTags = $request->validate([
            'tags' => 'nullable|min:3|max:255',
        ]);

        $tags = explode(',', $validatedTags['tags']);
        $job->update($validated);
        $job->updateTags($tags);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully'); 
    }

    public function delete(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.listing')->with('success', 'Job deleted successfully'); 
    }
}

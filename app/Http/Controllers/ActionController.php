<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
           $actions = Action::paginate(15);


        return view('actions.index', compact('actions'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('actions.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        Action::create($this->validateAction($request));
        return redirect()->route('actions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Action $action): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        return view('actions.show', compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('actions.edit', compact('action'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action): RedirectResponse
    {
        //
        $action->update($this->validateAction($request));

        return redirect()->route('actions.show', $action);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Action $action): RedirectResponse
    {
        //
        $action->delete();

        return redirect()->route('actions.index');
    }

    private function validateAction(Request $request): array
    {
        return $request->validate([
            'Issue' => 'required',
            'Action' => 'required',
            'Responsible' => 'required',
        ]);
    }
}

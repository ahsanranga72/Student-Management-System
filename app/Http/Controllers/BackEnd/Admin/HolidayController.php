<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HolidayController extends Controller
{
    private $holiday;

    public function __construct(Holiday $holiday)
    {
        $this->holiday = $holiday;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $holidays = $this->holiday->paginate(10);
        return view('backend.admin.holiday.list', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
        ])->validate();

        $holiday = $this->holiday;
        $holiday['title'] = $request['title'];
        $holiday['date'] = $request['date'];
        $holiday->save();

        return redirect()->route('backend.admin.holiday.create')->with('success', 'Holiday successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->holiday->find($id)->delete();
        return back()->with('success', 'Successfully removed.');
    }
}

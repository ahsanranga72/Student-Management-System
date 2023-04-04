<?php

namespace App\Http\Controllers\BackEnd\Admin;

use App\Http\Controllers\Controller;
use App\Models\IpAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IpAddressController extends Controller
{
    private $ip;

    public function __construct(IpAddress $ip)
    {
        $this->ip = $ip;
    }
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $ips = $this->ip->paginate(10);
        return view('backend.admin.ip_address.list', compact('ips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.ip_address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'ip_address' => 'required',
        ])->validate();

        $ip = $this->ip;
        $ip['name'] = $request['name'];
        $ip['ip'] = $request['ip_address'];
        $ip->save();

        return redirect()->route('backend.admin.ip-address.create')->with('success', 'IP Address successfully created.');
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
        $ip = $this->ip->find($id);
        return view('backend.admin.ip_address.edit', compact('ip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'ip_address' => 'required',
        ])->validate();

        $ip = $this->ip->find($id);
        $ip['name'] = $request['name'];
        $ip['ip'] = $request['ip_address'];
        $ip->save();

        return redirect()->route('backend.admin.ip-address.list')->with('success', 'IP Address successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ip->find($id)->delete();
        return back()->with('success', 'Successfully removed.');
    }
}

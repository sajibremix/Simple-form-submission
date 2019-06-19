<?php

namespace App\Http\Controllers;

use App\Forms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::whereBetween('entry_at', [date("Y-m-d 00:00:00"), date("Y-m-d 23:59:59")])->get();
        return view('sections.submission_data')->with('data',$forms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'=>'required|max:10',
            'buyer'=>'required|max:255',
            'buyer'=>'required|max:255',
            'receipt_id'=>'required|max:20',
            'items.*'=>'required|max:255',
            'buyer_email'=>'required|email|max:50',
            'note'=>'required',
            'city'=>'required|max:20',
            'phone'=>'required|max:20',
            'entry_by'=>'required|max:10'
        ]);

        if(isset($validator)){
            if ($validator->fails()) {
                return redirect()->route('sections.form')
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        $forms = new Forms;
        $forms->amount = $request->input('amount');
        $forms->buyer = $request->input('buyer');
        $forms->receipt_id = $request->input('receipt_id');
        $forms->items = json_encode($request->input('items'));
        $forms->buyer_email = $request->input('buyer_email');
        $forms->buyer_ip = $request->ip();
        $forms->note = $request->input('note');
        $forms->city = $request->input('city');
        $forms->phone = $request->input('phone');
        $forms->hash_key = Hash::make($request->input('receipt_id'));
        $forms->entry_at = date("Y-m-d H:i:s");
        $forms->entry_by = $request->input('entry_by');
        $forms->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function show(Forms $forms)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function edit(Forms $forms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forms $forms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forms  $forms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forms $forms)
    {
        //
    }

    public function get_filter_data(Request $request){
        $form = date( 'Y-m-d 00:00:00',strtotime($request->form) );
        $to = date( 'Y-m-d 23:59:59',strtotime($request->to) );
        $forms = Forms::whereBetween('entry_at', [$form, $to])->get();
        return view('sections.data')->with('data',$forms);
    }
}

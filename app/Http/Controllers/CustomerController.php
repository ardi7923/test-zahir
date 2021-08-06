<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->q;
        $name   = $request->name;
        $gender = $request->gender;
        $phone  = $request->phone;
        $email  = $request->email;
        $limit  = $request->limit ?? 10;
        

        if ($search) {
            $customers =  $this->model->where('code', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->get();

            return response(200,$customers);
        }else{
            
            $customers = Customer::query();

            if ($name) {

                $customers->where('name', 'like', '%' . $name . '%');
            }

            if ($gender) {
                $customers->where('gender', 'like', '%' . $gender . '%');
            }

            if ($email) {
                $customers->where('email', 'like', '%' . $email . '%');
            }

            if ($phone) {
                $customers->where('phone', 'like', '%' . $phone . '%');
            }

            return response(200, $customers->paginate($limit));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace duncanrmorris\suppliers\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use duncanrmorris\suppliers\App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use duncanrmorris\suppliers\App\suppliers_contacts;
use duncanrmorris\suppliers\App\suppliers_contact_history;
use duncanrmorris\suppliers\App\purchases;


class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Suppliers $suppliers)
    {
        //

        return view('suppliers::suppliers', ['suppliers' => $suppliers->orderby('Company','ASC')->get()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suppliers::new');
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

        $todayDate = date("Y-m-d H:i:s");
        $name = $request->input('name');
        $address = $request->input('address');
        $town = $request->input('town');
        $county = $request->input('county');
        $postcode = $request->input('postcode');
        $country = $request->input('country');
        $vat_no = $request->input('tax_no');


        suppliers::insert(
            ['supplier_id' => Str::random(60),'company' => $name, 'address' => $address, 'town' => $town,'county' => $county, 'postcode' => $postcode, 'country' => $country, 'vat_no' => $vat_no, 'status' => 'Pending', 'created_at' => $todayDate]
        );

        return redirect('suppliers')->withStatus(__('Supplier successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(suppliers $suppliers, $id, suppliers_contacts $model, suppliers_contact_history $history, purchases $purchases)
    {
        //
        
        return view('suppliers::view',['supplier' => $suppliers->where('supplier_id', $id)->get(), 'supplier_contacts' => $model->paginate(6), 'contact_history' => $history->orderby('contact_date','DESC')->paginate(6), 'purchases' => $purchases->where('supplier_id',$id)->orderby('invoice_date','DESC')->paginate(6),
        'count_contacts' => $model->where('supplier_id', $id)->count(),'count_crm' => $history->where('supplier_id', $id)->count(),'count_invoices' => $purchases->where('supplier_id', $id)->count(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit($id, suppliers $suppliers)
    {
        //
      
        return view('suppliers::edit',['suppliers' => $suppliers->where('supplier_id', $id)->get()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, suppliers $suppliers, $id)
    {
        //
        $todayDate = date("Y-m-d H:i:s");
        $name = $request->input('name');
        $address = $request->input('address');
        $town = $request->input('town');
        $county = $request->input('county');
        $postcode = $request->input('postcode');
        $country = $request->input('country');
        $vat_no = $request->input('tax_no');
        $status = $request->input('status');

        DB::update('update suppliers set company = ?, address = ?, town = ?, county = ?, postcode = ?, country = ?, vat_no = ?, status = ?, updated_at = ? where supplier_id = ?',[$name,$address,$town,$county,$postcode,$country,$vat_no,$status,$todayDate,$id]);

        return redirect('suppliers')->withStatus(__('Supplier successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        suppliers::where('supplier_id',$id)
        ->delete();

        return redirect('suppliers')->withDelete(__('Supplier successfully Deleted.'));
    }

    public function contactadd(Request $request)
    {
        
        suppliers_contacts::create([
            'supplier_id' => $request['c_id'],
            'name' => $request['name'],
            'job_role' => $request['job'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'mobile' => $request['mobile'],
            'primary' => $request['primary'],
            ]);

            return back()->withStatus(__('Supplier Contact successfully created.'));
    }

    public function contactedit(Request $request, $id)
    {
        
        suppliers_contacts::where('id',$id)
            ->update([
            'name' => $request['name'],
            'job_role' => $request['job'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'mobile' => $request['mobile'],
            'primary' => $request['primary'],
            ]);

            return back()->withStatus(__('Supplier Contact successfully updated.'));
    }

    public function contactdel($id)
    {
        
        suppliers_contacts::where('id',$id)
            ->delete();

            return back()->withdelete(__('Supplier Contact successfully removed.'));
    }
}

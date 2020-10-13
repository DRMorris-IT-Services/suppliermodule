@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'suppliers'
])

@section('content')

@foreach ($supplier as $c)
    <div class="content">
        @include('projectsmodule::layouts.alerts')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="home-tab" href="{{route('suppliers')}}" role="tab" aria-controls="home" aria-selected="true">List</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="profile-tab"  data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contacts-tab"  data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">Contacts ({{$count_contacts}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="crm-tab"  data-toggle="tab" href="#crm" role="tab" aria-controls="crm" aria-selected="false">CRM ({{$count_crm}})</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="invoices-tab"  data-toggle="tab" href="#invoices" role="tab" aria-controls="invoices" aria-selected="false">Invoices ({{$count_invoices}})</a>
  </li>
  @if (AUTH::user()->suppliers_edit == "on")
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" href="{{ route('suppliers.edit',[$c->supplier_id]) }}" role="tab" aria-controls="profile" aria-selected="false">Edit Supplier</a>
  </li>
  @endif
</ul>
    
        <div class="row">
        

            <div class="col-md-12 text-white">
               
                        <h2>{{$c->company}}</h2>
                        
               
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

    <div class="row">
        <!-- new row -->
        <div class="col-md-4 text-white">
               
                        <h5>Address Info</h5>
                        
                
                        {{$c->address }} <br>
                        {{$c->town }} <br>
                        {{$c->county }} <br>
                        {{$c->postcode }} <br>
                        {{$c->country }} <br>
                   
            </div>

            <div class="col-md-4 text-white">
                
                        <h5>Tax Info</h5>
                        
                   
                        {{$c->vat_no }} <br>
                        
                   
            </div>

            <div class="col-md-2 text-white">
                
                        <h5 >Status</h5>
                        
                   
                        {{$c->status }} <br>
                        
                    
            </div>

            <div class="col-md-2 text-white">
               
                        <h5>Actions</h5>
                        
                    
                        Created: {{date('d/m/y H:i', strtotime($c->created_at))}} <br>
                        Last Updated: {{date('d/m/y H:i', strtotime($c->updated_at))}} <br>
                        
                    
            </div>

            <!-- row end -->
        </div>

</div>

<div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
  <div class="row">
        <!-- new row -->
        <div class="col-md-12 text-white">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        @if (AUTH::user()->suppliers_edit == "on")
        <li class="nav-item">
            <a class="nav-link" id="profile-tab"  data-toggle="modal" data-target="#exampleModalCenter" href="#" role="tab" aria-controls="profile" aria-selected="false">Add Contact</a>
        </li>
        @endif
        </ul>
                
                        <h3>Contacts</h3>
                        
                        
                    
                            <table class="table">
                            <thead>
                            <tr>
                            <th>Name</th>
                            <th>Job Role</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Mobile</th>
                            <th>Primary</th>
                            <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier_contacts as $cc)
                                <tr>
                                <td>{{$cc->name}}</td>
                                <td>{{$cc->job_role}}</td>
                                <td>{{$cc->email}}</td>
                                <td>{{$cc->telephone}}</td>
                                <td>{{$cc->mobile}}</td>
                                <td>{{$cc->primary}}</td>
                                <td>
                                <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#contact_edit{{$cc->id}}"><i class="fa fa-edit"></i></button>
                                        <!-- MODAL EDIT CONTACT -->
                                        <form class="col-md-12" action="{{ route('suppliers.contact.edit',['id' => $cc->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                        
                                        <div class="modal fade" id="contact_edit{{$cc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark text-white">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Contact</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <div class="modal-body text-dark">
                                            
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" class="form-control" placeholder="Contact Name"  value="{{$cc->name}}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="job" class="form-control" placeholder="Job Role"  value="{{$cc->job_role}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$cc->email}}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="telephone" class="form-control" placeholder="Telephone" value="{{$cc->telephone}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{$cc->mobile}}" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label>Primary Contact:</label>
                                                                        @if($cc->primary == "on")
                                                                        <input type="checkbox" name="primary" class="form-control" checked >
                                                                        @else
                                                                        <input type="checkbox" name="primary" class="form-control" >
                                                                        @endif
                                                                    </div>
                                                        </div>
                                                            <div class="modal-footer bg-dark text-white">
                                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                            </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                            
                                        
                                        </form>

                                        <!-- END MODAL FOR EDIT CONTACT --> 

                                <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#contact_del{{$cc->id}}"><i class="fa fa-trash"></i></button>

                                <!-- MODAL DELETE CONTACT -->
                                <form class="col-md-12" action="{{ route('suppliers.contact.del',['id' => $cc->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                        
                                        <div class="modal fade" id="contact_del{{$cc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Contact</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                            
                                            <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                            <h5>You are going to remove this supplier's contact, are you sure?</h5>
                                            <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                   
                                            </div>
                                            <div class="modal-footer bg-dark text-white">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </form>

                                        <!-- END MODAL FOR DELETE CONTACT --> 
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        
                    
            </div>
        

        <!-- end row -->
        </div>

        <!-- MODAL ADD CONTACT -->
            <form class="col-md-12" action="{{ route('suppliers.contact.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="c_id" value="{{$c->supplier_id}}" >
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-dark">
                        
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Contact Name"  required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="job" class="form-control" placeholder="Job Role"  >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email"  >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telephone" class="form-control" placeholder="Telephone" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" >
                                </div>
                                <div class="form-group">
                                <label>Primary Contact:</label>
                                    <input type="checkbox" name="primary" class="form-control" >
                                </div>
                        </div>
                        <div class="modal-footer bg-dark text-white">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </form>

<!-- END MODAL FOR ADD CONTACT -->



<div class="tab-pane fade" id="crm" role="tabpanel" aria-labelledby="crm-tab">
<!-- CONTACT HISTORY-->
    <div class="row">
        <!-- new row -->
        <div class="col-md-12 text-white">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
        @if (AUTH::user()->suppliers_edit == "on")
        <li class="nav-item">
            <a class="nav-link" id="profile-tab"  href="{{ route('suppliers.crm.add',['id' => $c->supplier_id]) }}" role="tab" aria-controls="profile" aria-selected="false">Add CRM Entrie</a>
        </li>
        @endif
        </ul>
                
                        <h5 >Contact History</h5>
                        
                    
                            <table class="table">
                            <thead>
                            <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Summary</th>
                            <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contact_history as $history)
                            <tr>
                            <td>{{$history->contact_date}}</td>
                            <td>{{$history->contact_type}}</td>
                            <td>{{$history->contact_summary}}</td>
                            <td>
                            <a href="{{route('suppliers.crm.view',['id' => $history->id])}}"><button class="btn btn-sm fa fa-eye btn-outline-success"></button></a>
                            <a href="{{route('suplpiers.crm.edit',['id' => $history->id, 'cid' => $history->supplier_id])}}"><button class="btn btn-sm fa fa-edit btn-outline-warning"></button></a>
                            
                            <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#contact_his{{$history->id}}"><i class="fa fa-trash"></i></button>

                                <!-- MODAL DELETE HISTORY -->
                                <form class="col-md-12" action="{{ route('suppliers.crm.del',['id' => $history->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                        
                                        <div class="modal fade" id="contact_his{{$history->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Contact History</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                            
                                            <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                            <h5>You are going to remove this client's contact history, are you sure?</h5>
                                            <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                   
                                            </div>
                                            <div class="modal-footer bg-dark text-white">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </form>

                                        <!-- END MODAL FOR DELETE HISTORY --> 
                            </td>
                            </tr>
                            @endforeach

                            </tbody>
                            </table>
                            </div>
                        
                    
            </div>
        

        <!-- end row -->
    </div>
<!-- END CONTACT HISOTRY -->


    <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">

            <div class="row">
        
                <div class="col-md-12 text-white">
                        
                                <h5>Invoices</h5>
                                
                            
                                <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>Client</th>
                                                <th>Invoice Date</th>
                                                <th>Due Date</th>
                                                <th>Net</th>
                                                <th>Tax</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($purchases as $i)
                                            <tr>
                                                <td>@foreach($supplier as $c) @if($i->client_id == $c->client_id) {{$c->company}} @endif @endforeach</td>
                                                <td>{{$i->invoice_date}}</td>
                                                <td>{{$i->invoice_due}}</td>
                                                <td>{{$i->net_total}}</td>
                                                <td>{{$i->tax_total}}</td>
                                                <td>{{$i->grand_total}}</td>
                                                <td>{{$i->status}}</td>
                                                <td>
                                            <a href="{{route('purchases.download',['id' => $i->invoice_id])}}"> <button class="btn btn-sm btn-outline-primary fa fa-download"></button></a>
                                                <a href="{{route('purchases.view',['id' => $i->invoice_id])}}"><button class="btn btn-sm btn-outline-success fa fa-eye"></button></a>
                                                

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                
                    
                </div>
            
        </div>

        <!-- end content -->
    </div>

</div>
</div>
    @endforeach
@endsection

@push('scripts')
   
@endpush
@extends('layouts.app')

@section('content')
@foreach ($suppliers as $c)
    <div class="content">
        <div class="container">
        @include('suppliers::layouts.alerts')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" href="{{route('suppliers')}}" role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" href="{{ route('suppliers.new') }}" role="tab" aria-controls="profile" aria-selected="false">New Supplier</a>
            </li>
            
          </ul>
          
       
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Update Supplier - {{$c->company}}</h3></div>
        
                        <div class="card-body">
                            <form class="col-md-12" action="{{ route('suppliers.update',[$c->supplier_id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')      
                                    <h2 class="text-center py-3">Updating Process</h2>
                
                
                <div class="container py-2">
                <!-- timeline item 1 -->
                <div class="row no-gutters">
                    <div class="col-sm"> <!--spacer--> </div>
                    <!-- timeline item 1 center dot -->
                    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        @if ($c->company == '')
                            <span class="badge badge-pill bg-light border bg-danger">&nbsp;</span>
                            @else
                            <span class="badge badge-pill bg-light border bg-success">&nbsp;</span>
                            @endif
                        </h5>
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <!-- timeline item 1 event content -->
                    <div class="col-sm py-2 ">
                                
                                <h4 class="card-title text-muted">1. Company Name</h4>
                                <p class="card-text">Please enter the company name of the client:</p>
                                <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Company" value="{{ $c->company}}" required>
                                </div>
                                                    
                                                
                           
                    </div>
                </div>
                <!--/row-->
                <!-- timeline item 2 -->
                <div class="row no-gutters">
                    <div class="col-sm py-2 ">
                        
                               
                                <h4 class="card-title text-muted">2. Address</h4>
                                <p class="card-text">Please enter the address for the company</p>
                                <div class="form-group">
                                @if ($c->address == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                 @endif
                                <input type="text" name="address" class="form-control " placeholder="Address" value="{{ $c->address}}">
                                </div>
                                <div class="form-group">
                                @if ($c->town == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                @endif
                                <input type="text" name="town" class="form-control " placeholder="Town" value="{{ $c->town}}">
                                </div>
                                <div class="form-group">
                                @if ($c->county == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                @endif
                                <input type="text" name="county" class="form-control " placeholder="County" value="{{ $c->county}}">
                                </div>
                                <div class="form-group">
                                @if ($c->postcode == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                @endif
                                <input type="text" name="postcode" class="form-control " placeholder="Postcode" value="{{ $c->postcode}}">
                                </div>
                                <div class="form-group">
                                @if ($c->country == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                @endif
                                <input type="text" name="country" class="form-control " placeholder="Country" value="{{ $c->country}}">
                                </div>
                                
                            
                    </div>
                    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        @if ($c->address == '')
                            <span class="badge badge-pill bg-danger">&nbsp;</span>
                            @else
                            <span class="badge badge-pill bg-success">&nbsp;</span>
                            @endif
                            
                        </h5>
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-sm"> <!--spacer--> </div>
                </div>
                <!--/row-->
                <!-- timeline item 3 -->
                <div class="row no-gutters">
                    <div class="col-sm"> <!--spacer--> </div>
                    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        @if ($c->vat_no == '')
                            <span class="badge badge-pill bg-light border bg-danger">&nbsp;</span>
                            @else
                            <span class="badge badge-pill bg-light border bg-success">&nbsp;</span>
                            @endif
                        </h5>
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-sm py-2">
                        
                                
                                <h4 class="card-title">3. TAX Registraion</h4>
                                <p>Please enter the Tax number for the client</p>
                                <div class="form-group">
                                <input type="text" name="tax_no" class="form-control " placeholder="Tax ID" value="{{ $c->vat_no}}" >
                                </div>
                            
                    </div>
                </div>
                <!--/row-->
                <!-- timeline item 4 -->
                <div class="row no-gutters">
                    <div class="col-sm py-2 ">
                       
                                <h4 class="card-title text-muted">4. Status</h4>
                                <p class="card-text">Please enter the status for the company</p>
                                <div class="form-group">
                                @if ($c->status == '')
                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                 @endif
                                <select  name="status" class="form-control " ><option>{{ $c->status}}</option>
                                <option>--------</option>
                                <option>Active</option>
                                <option>On-Hold</option>
                                <option>Deactive</option>
                                <option>Archived</option>
                                </select>
                                </div>
                                
                                
                            
                    </div>
                    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        @if ($c->address == '')
                            <span class="badge badge-pill bg-danger">&nbsp;</span>
                            @else
                            <span class="badge badge-pill bg-success">&nbsp;</span>
                            @endif
                            
                        </h5>
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-sm"> <!--spacer--> </div>
                </div>
                <!--/row-->
                <!-- timeline item save -->
                <div class="row no-gutters">
                    <div class="col-sm"> <!--spacer--> </div>
                    <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                        <h5 class="m-2">
                        
                            <span class="badge badge-pill bg-light border bg-info">&nbsp;</span>
                            
                        </h5>
                        <div class="row h-50">
                            <div class="col border-right">&nbsp;</div>
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-sm py-2 ">
                       
                                
                            <h4 class="card-title">5. Save</h4>
                                <p>Please now ensure you click the save button below to update the client.</p>
                                <input type="submit" value="save" class="btn btn-md btn-outline-success">
                                <a href="javascript:history.back()"><input type="button" value="cancel" class="btn btn-md btn-outline-primary"></a>
                            
                    </div>
                </div>
                <!--/row-->

            </form>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    
    @endforeach

@endsection

@push('scripts')
   
@endpush
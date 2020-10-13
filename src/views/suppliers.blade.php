@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'suppliers'
])

@section('content')
    <div class="content">
        @include('projectsmodule::layouts.alerts')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" href="{{route('suppliers')}}" role="tab" aria-controls="home" aria-selected="true">List</a>
  </li>
  @if (AUTH::user()->suppliers_add == "on")
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" href="{{ route('suppliers.new') }}" role="tab" aria-controls="profile" aria-selected="false">New Supplier</a>
  </li>
  @endif
</ul>
    
        <div class="row">
       

            <div class="col-md-12 text-white">
                
                        <h2>Suppliers</h2>
                        
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Company
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        Town
                                    </th>
                                    <th>
                                        County
                                    </th>
                                    <th>
                                        Postcode
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        TAX ID
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                  
                                </thead>
                                <tbody>
                                @foreach( $suppliers as $c)
                                <tr>
                                <td><a href="{{ route('suppliers.view',[$c->supplier_id]) }}" >{{$c->company}}</a></td>
                                <td>{{$c->address}}</td>
                                <td>{{$c->town}}</td>
                                <td>{{$c->county}}</td>
                                <td>{{$c->postcode}}</td>
                                <td>{{$c->country}}</td>
                                <td>{{$c->vat_no}}</td>
                                <td>{{$c->status}}</td>
                                <td>
                                @if(AUTH::user()->suppliers_edit == "on")
                                <a href="{{ route('suppliers.edit', [$c->supplier_id]) }}"><i class="fa fa-edit btn btn-sm btn-outline-warning"></i></a>
                                @endif &nbsp; &nbsp;
                                @if(AUTH::user()->suppliers_del == "on")
                                
                                <button class="btn btn-sm btn-outline-danger"data-toggle="modal" data-target="#contact_del{{$c->id}}"><i class="fa fa-trash"></i></button>

                                <!-- MODAL DELETE CLIENT -->
                                <form class="col-md-12" action="{{ route('suppliers.del',['id' => $c->supplier_id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                        
                                        <div class="modal fade" id="contact_del{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Supplier??</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                            
                                            <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                            <h5>You are going to remove this supplier, are you sure?</h5>
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

                                        <!-- END MODAL FOR DELETE CLIENT --> 
                                @endif
                                </td>
                                </tr>
                                 @endforeach
                        </tbody>
                            </table>
                        </div>

                        
                    
        </div>
    </div>
@endsection

@push('scripts')
   
@endpush
@extends('layouts.app')

@section('content')
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
                        <div class="card-header"><h3>{{ __('Suppiers') }}</h3></div>
        
                        <div class="card-body">
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
                                
                                </tr>
                                 @endforeach
                        </tbody>
                            </table>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    
        
@endsection

@push('scripts')
   
@endpush
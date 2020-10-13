@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'clients'
])

@section('content')
@foreach ($clients_history as $h)

<div class="content">
    @include('projectsmodule::layouts.alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Contact History</h5>
                        
                    </div>
                    <div class="card-body">
                    
                    </div>
                </div>
            </div>
          </div>
       

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">General Information</h5>
                        
                    </div>
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Contact Date</label>
                        <input type="text" name="contact_date" class="form-control" placeholder="YYYY-mm-dd"  value="{{$h->contact_date}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Contact Type</label>
                        <select name="contact_type" class="form-control" disabled><option>{{$h->contact_type}}</option>
                        <option></option>
                        <option>Call</option>
                        <option>Email</option>
                        <option>Online Meeting</option>
                        <option>Face-to-Face Meeting</option>
                        </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Summary</label>
                        <input type="text" name="contact_summary" class="form-control" placeholder="Contact Summary" value="{{$h->contact_summary}}" readonly>
                        </div>
                        </div>
                    
                    </div>
                    </div>

                    </div>
                </div>
            </div>
          
          
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Meeting Agenda</h5>
                        
                    </div>
                    <div class="card-body">
                   <textarea name="agenda" class="form-control" readonly> {{$h->meeting_agenda}}</textarea>
                   
                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Meeting Notes</h5>
                        
                    </div>
                    <div class="card-body">
                   <textarea name="notes" class="form-control" readonly>{{$h->meeting_notes}}</textarea>

                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Meeting Actions</h5>
                        
                    </div>
                    <div class="card-body">
                   <textarea name="actions" class="form-control" readonly>{{$h->meeting_actions}}</textarea>

                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Meeting Decisions</h5>
                        
                    </div>
                    <div class="card-body">
                   <textarea name="decisions" class="form-control" readonly>{{$h->meeting_decisions}}</textarea>

                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        
                        
                    </div>
                    <div class="card-body">
                    <a href="javascript:history.back()"><input type="button" value="Back" class="btn btn-md btn-primary"></a>
                    
               
                    </div>
                </div>
            </div>
          
        
    </div>

</div>
@endforeach
@endsection

@push('scripts')
   
@endpush
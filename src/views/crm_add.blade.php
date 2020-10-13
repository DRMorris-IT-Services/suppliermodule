@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'clients'
])

@section('content')

<form class="col-md-12" action="{{ route('clients.crm.save',['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')    

<div class="content">
    @include('projectsmodule::layouts.alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">New Contact History</h5>
                        <p class="card-category">Enter your contact report below</p>
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
                        <input type="text" name="contact_date" class="form-control" placeholder="YYYY-mm-dd"  required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Contact Type</label>
                        <select name="contact_type" class="form-control"><option></option>
                        <option>Call</option>
                        <option>Email</option>
                        <option>Online Meeting</option>
                        <option>Face-to-Face Meeting</option>
                        <option>Comment</option>
                        </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <label>Summary</label>
                        <input type="text" name="contact_summary" class="form-control" placeholder="Contact Summary" >
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
                   <textarea name="agenda" class="form-control"></textarea>

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
                   <textarea name="notes" class="form-control"></textarea>

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
                   <textarea name="actions" class="form-control"></textarea>

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
                   <textarea name="decisions" class="form-control"></textarea>

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
                    <a href="javascript:history.back()"><input type="button" value="cancel" class="btn btn-md btn-primary"></a>
                    <input type="submit" value="save" class="btn btn-md btn-success">
               
                    </div>
                </div>
            </div>
          
        
    </div>

</div>

</form>
@endsection

@push('scripts')
   
@endpush
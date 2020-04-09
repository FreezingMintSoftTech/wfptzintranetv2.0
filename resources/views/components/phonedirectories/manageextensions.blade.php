{{ Form::open(array('url' => '/update_contacts','class' => 'form-signin','role' => 'form','files' => 'true')) }}
<div class="input-group">
    <input type="file" name="file" value="{{ (old('file')) }}" class="form-control">
    <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Upload File</button>
    </span>
</div>
{{Form::token()}}
{{ Form::close() }}
<br>
@if(session('errors'))
<div class="alert alert-danger" role="alert">
    <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.
  </div>
@endif

@if(session('upload_message'))
<div class="alert alert-{{ session('upload_message') == 'File Uploaded Succesfully'? 'success':'danger' }} alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
    </button>

    @if(session('failures'))
        <h6><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('upload_message') }}</h6>

        @foreach(session('failures') as $failure)
            {{ 'Please check row number '.$failure->row().' "'.head($failure->errors()).'"' }}<br>
        @endforeach
    @elseif(session('errors'))
        <h6><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ session('upload_message') }}</h6>

        @foreach(session('errors') as $error)
            {{ 'Derick' }}<br>
        @endforeach
    @else
        <h6><i class="fa fa-check-square-o" aria-hidden="true"></i> {{ session('upload_message') }}</h6>
    @endif
</div>
@else
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Manage Numbers</h4>
    <p>Under this section you will be able to add, edit and remove contact details</p>
    <p class="mb-0"><strong>Make sure you upload the correct file extension</strong></p>
</div>
@endif
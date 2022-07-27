@if ($errors->any())
    <div class="alert alert-danger">
        <ol>
            @foreach ($errors->all() as $error)
                <li class="font-weight-bold"> => {{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif
@if(session('success'))
	<div class="alert alert-success">
		<b>{{ session('success') }}</b>
	</div>
@endif
@if(session('error'))
	<div class="alert alert-danger">
		<b>{{ session('error') }}</b>
	</div>
@endif
@if(session('warning'))
	<div class="alert alert-warning">
		<b>{{ session('warning') }}</b>
	</div>
@endif
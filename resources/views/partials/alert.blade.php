@if (session('message_type'))
	<div class="sufee-alert m-t-25 alert with-close alert-{{ session('message_type') }} alert-dismissible fade show">
	    <span class="badge badge-pill badge-{{ session('message_type') }}">{{ trans('alert.' . session('message_type')) }}</span>
	    {{ session('message_content') }}
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	    </button>
	</div>
@endif
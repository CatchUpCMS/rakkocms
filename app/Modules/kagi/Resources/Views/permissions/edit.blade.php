@extends($theme_back)


{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::permission.permission', 2) }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
	<script type="text/javascript" src="{{ asset('assets/js/restfulizer.js') }}"></script>
@stop

@section('inline-scripts')
	var text_confirm_message = '{{ trans('kotoba::account.ask.delete') }}';
@stop


{{-- Content --}}
@section('content')


<div class="row">
<h1>
	<p class="pull-right">
	<a href="/admin/permissions" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-edit fa-lg"></i>
	{{ trans('kotoba::permission.command.edit') }}
	<hr>
</h1>
</div>

<div class="row">
{!! Form::model(
	$permission,
	[
		'route' => ['admin.permissions.update', $permission->id],
		'method' => 'PATCH',
		'class' => 'form'
	]
) !!}

<div class="form-group">
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-gavel fa-fw"></i></span>
		<input type="text" id="name" name="name" value="{{ $permission->name }}" placeholder="{{ trans('kotoba::account.name') }}" class="form-control" autofocus="autofocus">
</div>
</div>

<div class="form-group">
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-bookmark fa-fw"></i></span>
		<input type="text" id="slug" name="slug" value="{{ $permission->slug }}" placeholder="{{ trans('kotoba::general.slug') }}" class="form-control">
</div>
</div>

<div class="form-group">
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-briefcase fa-fw"></i></span>
		<input type="text" id="description" name="description" value="{{ $permission->description }}" placeholder="{{ trans('kotoba::general.description') }}" class="form-control">
</div>
</div>

<hr>

<div class="row">
<div class="col-sm-12">
	<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.save') }}">
</div>
</div>

<br>

<div class="row">
<div class="col-sm-4">
	<a href="/admin/permissions" class="btn btn-default btn-block" title="{{ trans('kotoba::button.cancel') }}">
		<i class="fa fa-times fa-fw"></i>
		{{ trans('kotoba::button.cancel') }}
	</a>
</div>

<div class="col-sm-4">
	<input class="btn btn-default btn-block" type="reset" value="{{ trans('kotoba::button.reset') }}">
</div>

<div class="col-sm-4">
<!-- Button trigger modal -->
	<a data-toggle="modal" data-target="#myModal" class="btn btn-default btn-block" title="{{ trans('kotoba::button.delete') }}">
		<i class="fa fa-trash-o fa-fw"></i>
		{{ trans('kotoba::general.command.delete') }}
	</a>
</div>
</div>

{!! Form::close() !!}

</div> <!-- ./ row -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	@include($activeTheme . '::' . '_partials.modal')
</div>

@stop

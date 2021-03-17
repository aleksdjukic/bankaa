@extends(config('formbuilder.layout_file', 'layouts.admin'))

@prepend(config('formbuilder.layout_js_stack', 'scripts'))
	<script type="text/javascript">
		window.FormBuilder = {
			csrfToken: '{{ csrf_token() }}',
		}
	</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="{{ asset('public/vendor/formbuilder/js/jquery-ui.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/jquery-formbuilder/form-builder.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/moment.js') }}"></script>
	<script src="{{ asset('public/vendor/formbuilder/js/footable/js/footable.min.js') }}" defer></script>
	<script src="{{ asset('public/vendor/formbuilder/js/script.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endprepend

@prepend(config('formbuilder.layout_css_stack', 'scripts'))
	<link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/formbuilder/css/styles.css') }}{{ jazmy\FormBuilder\Helper::bustCache() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endprepend

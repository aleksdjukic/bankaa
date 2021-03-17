@extends('formbuilder::layout')
{{--@extends('layouts.admin', ['kategorijeNovosti' => true])--}}
@section('content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                PAGE BUILDER
            </div>
            <div class="search-side">

            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Formss

                                <div class="btn-toolbar float-md-right" role="toolbar">
                                    <div class="btn-group" role="group" aria-label="Third group">
                                        <a href="{{ route('formbuilder::forms.create') }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus-circle"></i> Create a New Form
                                        </a>

                                        <a href="{{ route('formbuilder::my-submissions.index') }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-th-list"></i> My Submissions
                                        </a>
                                    </div>
                                </div>
                            </h5>
                        </div>

                        @if($forms->count())
                            <div class="table-responsive">
                                <table class="table table-bordered d-table table-striped pb-0 mb-0">
                                    <thead>
                                    <tr>
                                        <th class="five">#</th>
                                        <th>Name</th>
                                        <th class="twenty-five">Link na srpskom</th>
                                        <th class="twenty-five">Link na engleskom</th>
{{--                                        <th class="ten">Submissions</th>--}}
                                        <th class="twenty-five">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($forms as $form)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $form->name }}</td>
                                            <td><input type="text" value="{{ route('stranica', ["sr", $form->slug_sr]) }}" id="myInputa_{{$form->id}}" style="width: 60%;color: white; background: #384064;border-style: none;padding: 6px;"><button onclick="copytoclipboard({{$form->id}})"  style="background: #384064; color: white; padding: 5px;">Copy link</button></td>
                                            <td><input type="text" value="{{ route('stranica', ["en", $form->slug_en]) }}" id="myInput_{{$form->id}}" style="width: 60%;color: white; background: #384064; border-style: none;padding: 6px;"><button onclick="copytoclip({{$form->id}})" style="background: #384064; color: white; padding: 5px;">Copy link</button></td>
{{--                                            <td>{{ $form->submissions_count }}</td>--}}
                                            <td>
                                                <a href="{{ route('formbuilder::forms.submissions.index', $form) }}"
                                                   class="btn btn-primary btn-sm"
                                                   title="View submissions for form '{{ $form->name }}'">
                                                    <i class="fa fa-th-list"></i> Data
                                                </a>
                                                <a href="{{ route('formbuilder::forms.show', $form) }}"
                                                   class="btn btn-primary btn-sm"
                                                   title="Preview form '{{ $form->name }}'">
                                                    <i class="fa fa-eye"></i>
                                                </a>
{{--                                                <a href="{{ route('formbuilder::forms.edit', $form->id)}}"--}}
                                                <a href="{{ route('stranice.edit', $form->id) }}"
                                                   class="btn btn-primary btn-sm" title="Edit form">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button class="btn btn-primary btn-sm clipboard"
                                                        data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}"
                                                        data-message="" data-original=""
                                                        title="Copy form URL to clipboard">
                                                    <i class="fa fa-clipboard"></i>
                                                </button>

                                                <form action="{{ route('formbuilder::forms.destroy', $form) }}"
                                                      method="POST" id="deleteFormForm_{{ $form->id }}"
                                                      class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm confirm-form"
                                                            data-form="deleteFormForm_{{ $form->id }}"
                                                            data-message="Delete form '{{ $form->name }}'?"
                                                            title="Delete form '{{ $form->name }}'">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($forms->hasPages())
                                <div class="card-footer mb-0 pb-0">
                                    <div>{{ $forms->links() }}</div>
                                </div>
                            @endif
                        @else
                            <div class="card-body">
                                <h4 class="text-danger text-center">
                                    No form to display.
                                </h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function copytoclip(id) {
            /* Get the text field */
            var copyText = document.getElementById("myInput_"+id);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Uspješno ste kopirali link stranice!',
                showConfirmButton: false,
                timer: 1500
            })
            // alert("Copied the text: " + copyText.value);
        }
    </script>

    <script>
        function copytoclipboard(id) {
            /* Get the text field */
            var copyText = document.getElementById("myInputa_"+id);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Uspješno ste kopirali link stranice!',
                showConfirmButton: false,
                timer: 1500
            })
            // alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection

@extends("layouts.master")

@section("content")
    <section class="section">
        <div class="container">
            <form action="{{ url('store-input-fields') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Section</th>
                        <th>Add Section</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="addMoreInputFields[0][name]" placeholder="Enter section"
                                   class="form-control"/>
                        </td>
                        <td>
                            <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                                Section
                            </button>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-outline-success btn-block">Save</button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        let i = 0;

        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td>' +
                '<input type="text" name="addMoreInputFields[' + i +'][name]" placeholder="Enter Name" class="form-control"/>' +
                '<input type="paragraph" name="addMoreInputFields[' + i +'][description]" placeholder="Enter Description" class="form-control"/>' +
                '<input type="date" name="addMoreInputFields[' + i +'][deadline]" placeholder="Enter Deadline" class="form-control"/> </td><td>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });

        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

    </script>
@endsection

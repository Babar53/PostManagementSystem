@extends('layouts.master')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    {{ $title }}
                </h5>
            </div>
            <div class="card-body">
                <div class="row">

                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="60%">Name</th>
                            <th width="20%">Action</th> <!-- slightly wider for two buttons -->
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
<script>
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('roles.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>

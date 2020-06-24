@extends('template')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/datatables.min.css') }}"/>
<style type="text/css">
	.void {
		display: none;
	}
	.details-control i{
		cursor: pointer;
	}
	thead>tr>th {
		text-align: center;
	}
</style>
@endsection
@section('content')
<main id="maincontent">

    <section>

        <div class="container">
            <div class="row">
                @include('part.teachermenu')
                <div class="col-lg-9 sub-menu-content w-100">
                    <h3 class="float-left d-inline-block mt-2">Student Table</h3>
                    <div class="table-responsive shadow p-3 mt-3">
                        <table id="students-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="void"></th>
                                    <th></th>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Batch No</th>
                                    <th>Role No</th>
                                    <th>Date Of Birth</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($students); $i++)
                                    <tr id="{{ $i }}">
                                        <td class="void"></td>
                                        <td class="details-control">
                                            <div class="d-flex justify-content-center">
                                                <i class="fas fa-plus-circle fa-lg text-success"></i>
                                            </div>
                                        </td>
                                        <td><center>{{ $i + 1 }}</center></td>
                                        <td>{{ $students[$i]->firstname }} {{ $students[$i]->lastname }}</td>
                                        <td>{{ $students[$i]->batch_no }}</td>
                                        <td>{{ $students[$i]->roll_no }}</td>
                                        <td>{{ $students[$i]->dateofbirth->format('jS F Y') }}</td>
                                        <td>{{ $students[$i]->address }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
/* Formatting function for row details - modify as you need */
function format ( id, d ) {
	let index = parseInt(id);
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
        	'<td rowspan="2">' + 
        	'<img src="' + d[index].profile_pic + '" class="rounded mx-auto d-block" width="90px" height="90px">' 
        	 + '</td>' +
            '<td>Phone Number:</td>'+
            '<td>'+d[index].phone+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Email Address</td>'+
            '<td>'+d[index].email+'</td>'+
        '</tr>'+
    '</table>';
}
$(document).ready( function () {
    var dt = $('#students-table').DataTable({
    	"columnDefs": [ 
    	{
	      	"targets": 1,
	      	"searchable": false,
	      	"orderable": false,
    	}
    ]
 	});
    // Array to track the ids of the details displayed rows
    var detailRows = []; 
    var students = {!! json_encode($students) !!};
    $('#students-table tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 		var icon = tr.find('i');
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            icon.removeClass('fa-minus-circle text-danger')
            .addClass('fa-plus-circle text-success');
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            icon.removeClass('fa-plus-circle text-success')
            .addClass('fa-minus-circle text-danger');
            row.child( format( tr.attr('id'), students ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
} );
</script>
@endsection
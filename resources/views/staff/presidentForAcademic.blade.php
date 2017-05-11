@extends('layout.staff_layout')
@section('title')
Staff
@endsection
@section('css')
@endsection
@section('content')
<style type="text/css">
	
	table, td, th {    
		border: 1px solid #ddd;
		text-align: center;
	}

	table {
		border-collapse: collapse;
		width: 90%;
	}

	th, td {
		padding: 10px;
	}
</style>
<section>
	<div >
		<div class="row">
			<h3>Vice President for Academic Affairs for Phuket Campus</h3>
		</div>	
		
		<div class="row">
			<div class="col l1 m1 s12"><a href="addPresidentForAcademic" class="btn">add</a></div>

			<div class="col l6 m6 s12 offset-l4	">
				<div class="input-field" style="">
					<i class="material-icons prefix">search</i>
					<input placeholder="PSU Passport" id="icon_prefix" type="text" class="validate">
					<label for="icon_prefix">Search</label>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<table class="striped">	
		<thead>
			<tr>
				<th data-field="ora">PSU Passport</th>
				<th data-field="adviser">Name</th>
				<th data-field="bdate">Begin date</th>
				<th data-field="edate">End Date</th>
				<th data-field="Email">Email</th>
				<th data-field="manage"></th>
			</tr>
		</thead>
			@foreach ($staffs as $s)
			<tr class="jsgrid-alt-row">
				<td>{{ $s->psu_passport }}</td>
				<td>{{ $s->title }}{{ $s->firstname }}  {{ $s->lastname }}</td>
				<td>{{ $s->begin_date }}</td>
				<td>{{ $s->end_date }}</td>
				<td>{{ $s->email }}</td>
				<td>
					<a href="editPresidentForAcademic_{{$s->staf_id}}"><i class="Tiny material-icons ">mode_edit</i></a>
					<a href="presidentForAcademic/delete/{{$s->staf_id}}"><i class="Tiny material-icons " style="color: red">delete</i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection
@section('js')	
@endsection
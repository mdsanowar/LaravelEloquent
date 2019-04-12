<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Eloquent Crud system</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h2 class="text-center">ALl Post</h2>
		<a href="" class="btn btn-sm btn-info" style="float: left">Home</a>
		<a href="" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#myModel" style="float: right;">Add New</a><br><br>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<table class="table table-bordered">
			@php
			   $show = DB::table('posts')->get();
		    @endphp
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Title</th>
		      <th scope="col">Author</th>
		      <th scope="col">Description</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($show as $item)
		    <tr>
		      <th scope="row">{{$item->id}}</th>
		      <td>{{$item->title}}</td>
		      <td>{{$item->author}}</td>
		      <td>{{$item->description}}</td>
		      <td>
		      	<a href="{{ URL::to('/edit-post/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
		      	<a href="{{ URL::to('/delete/'.$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	
	<div class="modal fade" id="myModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	            <form action="{{ route('insert.post') }}" method="POST">
	            	@csrf
				  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="Enter title">
				  </div>

				  <div class="form-group">
				    <label for="author">Author</label>
				    <input type="text" class="form-control" id="author" aria-describedby="emailHelp" name="author" placeholder="Enter author">
				  </div>
				  
				  <div class="form-group">
				    <label for="description">Textarea</label>
				    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
				  </div>

				  <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save Post</button>
			      </div>
				</form>
	      </div>
	  </div>
	</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
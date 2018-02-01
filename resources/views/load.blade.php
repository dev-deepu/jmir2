<div id="load" style="position: relative;">
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Name</th>
	      <th scope="col">Province</th>
	      <th scope="col">Salary</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  @foreach($users as $user)
	  	<tr>
	  		<td>{{ $user->name }}</td>
	  		<td>{{ $user->province }}</td>
	  		<td>{{ $user->salary }}</td>
	  		<td>
	  			<a href="{{ route('delete', ['user' => $user->id]) }}" class="delete">Delete</a>
	  		</td>
	  	</tr>    
	  @endforeach
	</table>
</div>
<div class="text-center">
	{{ $users->links() }}
</div>

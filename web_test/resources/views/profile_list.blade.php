@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    @foreach($profile as $pf)
    <?php $i = $i+1; ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$pf->first_name}}</td>
      <td>{{$pf->last_name}}</td>
      <td>{{$pf->email}}</td>
      <td>{{$pf->mobile}}</td>
      <td><button class="btn btn-primary" onclick='getEdit("<?php echo $pf->id ?>")'>edit</button>  
      <button class="btn btn-danger" onclick='delProfile("<?php echo $pf->id ?>","<?php echo $pf->first_name ?>")'>delete</button></td>
    </tr>
    @endforeach

  </tbody>
</table>
<center>
<a href="formProfile" ><button class="btn btn-success" >Create Profile</button></a>
</center>
@endsection

<!--JS-->
<script>
    function delProfile(id,first_name) {
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.post('delProfile', {id:id}, function (response)
    {
        Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    ).then((result)=>{
        location.reload();
    })

    });
  }
})
    }
    function getEdit(id) {
    location.href ="edit_"+id
  }
</script>
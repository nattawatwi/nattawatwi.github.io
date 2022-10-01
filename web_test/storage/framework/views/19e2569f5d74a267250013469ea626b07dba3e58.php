<?php $__env->startSection('content'); ?>
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
    <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $i = $i+1; ?>
    <tr>
      <th scope="row"><?php echo e($i); ?></th>
      <td><?php echo e($pf->first_name); ?></td>
      <td><?php echo e($pf->last_name); ?></td>
      <td><?php echo e($pf->email); ?></td>
      <td><?php echo e($pf->mobile); ?></td>
      <td><button class="btn btn-primary" onclick='getEdit("<?php echo $pf->id ?>")'>edit</button>  
      <button class="btn btn-danger" onclick='delProfile("<?php echo $pf->id ?>","<?php echo $pf->first_name ?>")'>delete</button></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
<center>
<a href="formProfile" ><button class="btn btn-success" >Create Profile</button></a>
</center>
<?php $__env->stopSection(); ?>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
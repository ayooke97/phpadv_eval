 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Tables</h1>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">User List</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>User ID</th>
                             <th>Email/Username</th>
                             <th>Role</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tfoot>
                         <tr>
                             <th>No</th>
                             <th>User ID</th>
                             <th>Email/Username</th>
                             <th>Role</th>
                             <th>Action</th>
                         </tr>
                     </tfoot>
                     <tbody>
                         <?php $i = 1 ?>
                         <?php if (mysqli_num_rows($post) > 0) :
                                foreach ($post as $pos) : ?>
                                 <tr>
                                     <td><?= $i ?></td>
                                     <td><?= $pos['kategoriID'] ?></td>
                                     <td><?= $pos['judul'] ?></td>
                                     <td><?= $pos['tanggalDibuat'] ?></td>
                                     <td>
                                         <form action="./delete.php" method="post">
                                             <a class="btn btn-warning" href='./editpost.php?idPostingan=<?= base64_encode($pos['idPostingan']) ?>'>Edit</a>
                                             <input type="hidden" name="id" value="<?= $pos['user_id'] ?>">
                                             <button class="btn btn-danger" type="submit" name="tbl_del">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             <?php $i++;
                                endforeach; ?>
                         <?php endif; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
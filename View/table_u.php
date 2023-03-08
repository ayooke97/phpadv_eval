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
                         <?php $i = 1;
                            if (isset($_GET['search_user'])) {
                                $user = mysqli_query($conn, "SELECT * FROM user WHERE user_id LIKE '%{$_GET['search_user']}%' OR username LIKE '%{$_GET['search_user']}%' OR role LIKE '%{$_GET['search_user']}%'");
                            } ?>
                         <?php if (mysqli_num_rows($user) > 0) :
                                foreach ($user as $usr) : ?>
                                 <tr>
                                     <td><?= $i ?></td>
                                     <td><?= $usr['user_id'] ?></td>
                                     <td><?= $usr['username'] ?></td>
                                     <td><?= $usr['role'] ?></td>
                                     <td>
                                         <form action="./delete.php" method="post">
                                             <a class="btn btn-warning" href='./edit.php?user_id=<?= $usr['user_id'] ?>'>Edit</a>
                                             <input type="hidden" name="id" value="<?= $usr['user_id'] ?>">
                                             <button class="btn btn-danger" type="submit" name="user_del">Delete</button>
                                         </form>
                                     </td>
                                 </tr>
                             <?php $i++;
                                endforeach; ?>
                         <?php else : ?>
                             <tr>
                                 <td colspan="5" class="text-center">Data tidak ditemukan</td>
                             </tr>
                         <?php endif; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
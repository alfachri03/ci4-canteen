
<main id="main">
<section class="section dashboard">
<div class="data-report bg-white p-3">
  <div class="title text-center bg-white">
    <h5 class="card-title mb-3">List <span>| Akun</span></h5>
  </div>
  <div class="laporan">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card mb-3 text-center" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-12">
              <div class="card-body">
                <h5 class="card-title">Total Admin</h5>
                <p class="card-text fw-bold text-danger" style="font-style:italic;"><?= $totalAdmin['is_admin'] ?></p>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card mb-3 text-center" style="max-width: 540px;">
          <div class="row g-0">   
            <div class="col-md-12">
              <div class="card-body">
                <h5 class="card-title">Total Pengguna</h5>
                <p class="card-text fw-bold text-danger" style="font-style:italic;"><?= $totalPengguna['is_admin'] ?></p>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<table id="tabel-data" class="mt-2 table table-bordered" width="100%" cellspacing="0">
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <thead>
      <tr>
          <th scope="col">Nama User</th>
          <th scope="col">Id User</th>
          <th scope="col">Email User</th>
          <th scope="col">Nomor Telepon</th>      
          <th scope="col">Role</th>      
          <th>Aksi</th>
      </tr>
    </thead>
    <tbody>      
      <?php foreach($data as $value) :?>                  
      <tr>                            
        <td><?= $value['name'] ?></td>
        <td><?= $value['acc_id'] ?></td>
        <td><?= $value['email'] ?></td>
        <td><?= $value['phone'] ?></td>                                                      
          <td>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if($value['is_admin'] == 1){echo 'Admin';}else{echo 'Pengguna';}  ?>
                </button>
                <ul class="dropdown-menu">                    
                    <li><a class="dropdown-item" href="<?=base_url('admin/role/').$value['acc_id'].'/1'?>">Admin</a></li>
                    <li><a class="dropdown-item" href="<?=base_url('admin/role/').$value['acc_id'].'/0'?>">Pengguna</a></li>
                </ul>
            </div>
          </td>   
          <td>
            <a href="<?=base_url('admin/removeUser/').$value['acc_id']?>" class="btn btn-danger">Hapus</a>
          </td>                                                      
      </tr>                            
      <?php endforeach; ?>                                               
    </tbody>
  </table>

</div>
  <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable();
      });
  </script>
  </section>
</main>
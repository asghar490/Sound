<?php
include('header.php');
include('config.php');
if(isset($_POST['add']))
{
    $username = $_POST['name'];
      $insertrole = "INSERT INTO role(name) values('".$username."')";
      $runbutton = mysqli_query($connect,$insertrole);
     if($runbutton)
    {
      echo "<script>alert('Role Added!')</script>";
    }
  }

  // delete work
  if(isset($_GET['del_id']))
{
    $delete_id = $_GET['del_id'];
    $deletequery = "DELETE FROM role where id = '".$delete_id."'";
    $executebutton = mysqli_query($connect,$deletequery);
    if($executebutton)
    {
        echo "<script>alert('Role Deleted')</script>";
    }
}
?>
  <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Role</h5>
              </div>
              <div class="card-body">
          
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" placeholder="Role"  name="name">
                      </div>
                    </div>
                   
                  </div>
                  <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" name="add">ADD</button>
              </div>
                </form>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="../assets/img/emilyz.jpg" alt="...">
                      <h5 class="title">Mike Andrew</h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                  </div>
                </p>
                
              </div>
             
            </div>
          </div>
        </div>


        <!-- SHOWROLE -->
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">SHOW ROLE</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      
                    <?php
                 $showrole = "SELECT * from role";
                $run = mysqli_query($connect,$showrole);
                 while($finaldata = mysqli_fetch_array($run))
                 {
                 ?>
                    
                      <tr>
                    <th><?php echo $finaldata['id'] ?></th>
                    <th><?php echo $finaldata['name'] ?></th>
                    <th>
                    <th><a href="addrole.php?del_id=<?php echo $finaldata['id'] ?>" class="btn btn-warning">Delete</a></th>
                    <th><a href="updaterole.php?up_id=<?php echo $finaldata['id'] ?>" class="btn btn-warning">Update</a></th>
                  </tr>
                      <?php
                         }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>





      
<?php
include('footer.php') 
?>
<?php
include('header.php');
if(isset($_POST['up_v']))
{
    $vaccineid =$_POST['vid'];
    $vaccinename =$_POST['vname'];
   
    $updatevaccine = "UPDATE vaccine set v_name = '".$vaccinename."' where v_id = '".$vaccineid."'  ";
    $excute_button = mysqli_query($connect,$updatevaccine);
    if($excute_button)
    {
         echo "<script>alert('Vaccine Updated')</script>";
    }
}
?>
  <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">UPDATE ROLE</h5>
              </div>
              <div class="card-body">
          
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" placeholder="update"  name="name">
                      </div>
                    </div>
                   
                  </div>
                  <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" name="add">UPDATE</button>
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


<?php
include('footer.php');
?>





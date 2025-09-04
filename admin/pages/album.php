<?php
include('header.php');
include('config.php');
if(isset($_POST['add']))
{
    $username = $_POST['album_name'];
      $insertrole = "INSERT INTO album(album_name) values('".$username."')";
      $runbutton = mysqli_query($connect,$insertrole);
     if($runbutton)
    {
      echo "<script>alert('Album Added!')</script>";
    }
  }
?>
<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Album</h5>
              </div>
              <div class="card-body">
          
                <form method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label>Album Name</label>
                        <input type="text" class="form-control" placeholder=""  name="album_name">
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




<?php
include('footer.php') 
?>
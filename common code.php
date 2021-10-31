include '../../../database.php';  
$data = new Databases;


<!-- Insert -->


    $insert_data = array(  
              'fname' => mysqli_real_escape_string($data->con, $_POST['fname']),
              'lname' => mysqli_real_escape_string($data->con, $_POST['lname']),
              'email' => mysqli_real_escape_string($data->con, $_POST['email']),
              'phone' => mysqli_real_escape_string($data->con, $_POST['phone']),
              'password' => md5(mysqli_real_escape_string($data->con, $_POST['password'])),
              'pancard' => mysqli_real_escape_string($data->con, $_POST['pancard']),
              'status' => 1,
              'aadhaar' => mysqli_real_escape_string($data->con, $_POST['aadhaar']),
          );  
          if($data->insert('registration', $insert_data))  
          {  
               echo '<script>alert("Registration Done Successfully")</script>';  
          }


<!-- Update -->
    if(isset($_POST["update"]))
    {
      $id = $_GET['id'];
      $category = mysqli_real_escape_string($data->con, $_POST['category']);
      $update_arr = array('category'=>$category);
      $data->updateData('emgcategory',$update_arr,$id);
      echo "<script>alert('Successfully Update A Record')</script>";
    }
<!-- Get -->
    $category = mysqli_real_escape_string($data->con, $_POST['category']);
    $condition_arr = array('id'=>$id);
    $result = $data->getData('emgcategory','*',$condition_arr);

<!-- Delete -->
    if(isset($_GET['type']) && $_GET['type']='delete')
    {
      $id = $data->get_safe_str($_GET['id']);
      $condition_arr = array('id'=>$id);
      $data->deleteData('emgcategory',$condition_arr);
      echo("<script>alert('successfully Delete a Record')</script");
    }
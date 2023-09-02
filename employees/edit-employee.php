<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="robots" content="noindex,nofollow">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="referrer" content="no-referrer">
  <title>Employees List</title>
  <link rel="icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" sizes="192x192" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    body {
      position: relative;
    }

    .card img {
      width: 18rem;
      height: 18rem;
      object-fit: cover;
    }

    .logout {
      position: absolute;
      top: 0;
      right: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <h2 class="my-4"><a href="./">Employees List</a> / New Employee</h2>
    <form action="save-new-employee.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="mb-2 col-6">
          <label for="new-post-type-input">Name</label>
          <input type="text" style="text-transform: capitalize;" class="form-control" id="new-post-type-input" placeholder="Name" name="name" autofocus required>
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">Phone</label>
          <input type="tel" class="form-control" id="new-post-mw-input" placeholder="Phone" name="phone" required>
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">Alternate Phone</label>
          <input type="tel" class="form-control" id="new-post-mw-input" placeholder="Alternate Phone" name="alternate_phone">
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">Village</label>
          <input type="text" class="form-control" id="new-post-mw-input" placeholder="Village" name="village">
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">Police Station</label>
          <input type="text" class="form-control" id="new-post-mw-input" placeholder="Police Station" name="police_station">
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">District</label>
          <input type="text" class="form-control" id="new-post-mw-input" placeholder="District" name="district">
        </div>
        <div class="mb-2 col-6">
          <label for="new-post-mw-input">Adhaar No</label>
          <input type="text" class="form-control" id="new-post-mw-input" placeholder="Adhaar No" name="adhaar_no">
        </div>
        <div class="mb-2 col-6">
          <label for="formFile">Adhaar Card</label>
          <input class="form-control" type="file" id="formFile" name="adhaar_card">
        </div>
        <div class="mt-2 col-6">
          <button type="submit" class="btn btn-primary">Add Employee</button>
          <a href="./" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</body>

</html>
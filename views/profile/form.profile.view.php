
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Image Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS styles */
    .custom-file-input {
      color: transparent;
    }
    .custom-file-input::-webkit-file-upload-button {
      visibility: hidden;
    }
    .custom-file-input::before {
      content: 'Choose Image';
      color: #fff;
      background-color: #007bff;
      border: 1px solid #007bff;
      border-radius: 5px;
      padding: 8px 12px;
      outline: none;
      display: inline-block;
      cursor: pointer;
    }
    .custom-file-input:hover::before {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .custom-file-input:active::before {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .custom-file-input:focus::before {
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
  </style>
</head>
<body>

<div class="container mt-5 m-auto" style="width:40%">
  <form class="p-4 border rounded shadow">
    <div class="mb-3">
      <label for="imageUpload" class="form-label">Upload Your Image</label>
      <input type="file" class="form-control custom-file-input" id="imageUpload" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success" style="width:100%">Submit</button>
  </form>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

<!doctype html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<style>
.body {

    margin: 0px;
    padding: 10px;
}
    </style>
    <title>Upload File</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-4">
                <div class="card">
                    <form>
                    <div class="card-header" style="background-color:#0d6efd; color:#fff;">
                        Upload File
                    </div>
                    <div class="card-body" id="chat-box" style="background-color:#f7f7f7">
                    </div>
                    <div class="card-footer">
                    
                            <div class="form-group">
                                <div class="row">
                                    <label for="uploadFile" class="form-label">Upload CSV / XLS File</label>

                                    <div class="col-md-10">
                                        <input class="form-control" type="file" id="uploadFile" name="uploadFile" required>                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" id="file_upload" type="button">Upload</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<script>

const fileInput = document.getElementById('uploadFile');
const uploadButton = document.getElementById('file_upload');
uploadButton.addEventListener('click', function() {
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('file', file);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/uploadFile');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            console.log(response.message);
        }
    };
    xhr.send(formData);
});


    </script>


  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <div class="mb-3">
    <form method="post" enctype="multipart/form-data" action="{{url('/hello')}}">
        @csrf
    <label for="file" class="form-label">Choose file</label>
    <input
        type="file"
        class="form-control"
        name="image"
        id=""
        placeholder=""
        aria-describedby="fileHelpId"
    />
    <input type="submit" value="submit" name="btn_submit"/>
</form>
  </div>
  
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="row">
		<div class="container" style="margin-top:100px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info">
                    <h3 style="text-align: center;">{{ $message }}</h3>
                </div>

                <a href="{{ route('home') }}"> 
                    <button style="margin-left: 40%;" type="btn btn-primary">Go Back</button>
                </a>
            </div>
		</div>
	</div>

</body>
</html>
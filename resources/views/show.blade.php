<!DOCTYPE html>
<html>
<head>
	<style>
		.card{
				width: 750px;
				background: #fff;
				border-radius: 5px;
				margin: auto;
				border:1px solid;
			}

			.head{
				height: 120px;
			}

			.logo{
				float: left;
				margin-top: 8px;
				width: 110px;
			}

			.logo img{
				height: 100px;
				width: 100px;
				float: right;
				border-radius: 5px;
			}

			.name{
				float: left;
				padding: 20px 25px;
				width: 470px;
			}

			.name h2{
				margin-top: 0;
			}

			.image{
				width: 120px;
				float: left;
			}
			.image img{
				height: 110px;
				width: 110px;
				margin-top: 10px;
				border-radius: 5px;
			}

			.title{
				height: 30px;
			}

			.admitcard p {
				text-align: center;
				border: 1px solid;
				margin: 25px 230px;
				border-radius: 3px;
			}

			.content {
				margin: 10px 20px 10px 20px;
    			display: flex;
			}

			.content p{
				margin: 5px 0;
			}

			.co1{
				width: 50%;
    			padding-left: 10%;
			}

			.co2{
				width: 50%;
    			padding-left: 10%
			}
	
	</style>

	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
		
@if(isset($data['admit_card']) && $data['student_type'] != '')

<div class="card">
		<div class="head">
			<div class="logo">
				<img src={{ asset('img/logo.png') }}>
			</div>
			<div class="name">
				<h2>Darul Qirat Majidia Fultali Trust, Fultali Saheb Bari, Zakiganj, Sylhet, Bangladesh</h2>
			</div>
			<div class="image">
				<img src="{{ $data['admit_card']->avatar }}">
			</div>
		</div><!-- head -->

		<div class="title">
			<div class="admitcard">
				<p>Admit Card</p>
			</div>
		</div><!-- title -->

		<div class="content">
			<div class="co1">
				<p><b>Year:</b> {{ $data['year'] }}</p>
				<p><b>Name:</b> {{ $data['admit_card']->name }}</p>
                <p><b>Roll Number:</b>{{ $data['admit_card']->roll_number }}</p>
				@if(isset($data['residential_status']) && !empty($data['residential_status']))
            	<p><b>Residential Status:</b> {{ $data['residential_status'] }}</p>
            	@endif
			</div>
			<div class="co2">
				<p><b>Jamat:</b> Sadis</p>
				<p><b>Father Name:</b> {{ $data['admit_card']->father_name}} </p>
				<p><b>Student Type:</b> {{ $data['student_type'] }}</p>
				@if(isset($data['exam_date']) && !empty($data['exam_date']))
					<p><b>Exam Date</b> {{ $data['exam_date'] }}</p>
				@endif
				@if(isset($data['hall']) && !empty($data['hall']))
				<p><b>Farik: {{ $data['hall'] }}</b></p>
				@endif
			</div>
		</div><!-- content -->
	</div><!-- card -->

	<div style="margin-top: 20px;">
		<a href="{{ route('admit-card.download', $data['admit_card']->roll_number) }}" type="button" class="btn btn-success" style="margin-left: 40%; text-decoration: none;">
		<span class="glyphicon glyphicon-download" aria-hidden="true"></span> Download PDF
		</a>
		<a href="{{ route('home') }}" type="button" class="btn btn-danger">Cancel</a> 
	</div>

@else

	<div class="row">
		<div class="container" style="margin-top:100px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-info">
                    <h3 style="text-align: center;">You are not registered yet. So Please Register First.</h3>
                </div>

                <a href="{{ route('home') }}"> 
                    <button style="margin-left: 40%;" type="btn btn-primary">Go Back</button>
                </a>
            </div>
		</div>
	</div>

@endif
			
</body>
</html>
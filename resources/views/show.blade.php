<!DOCTYPE html>
<html>
<head>
	<style>

	.card {
		    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
		    transition: 0.3s;
		    margin-top:100px;
		    
			}
	</style>

	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
		
@if(isset($data['admit_card']) && $data['student_type'] != '')

<div class="col-md-8 col-md-offset-2 ui card">
	<div class="col-md-12" style="margin-top: 20px">
		<div class="col-sm-1">
			<img src={{ asset('img/logo.png') }} style="height:80px;width:80px;">
		</div>
		<div class="col-sm-11">
			<h3 style="margin-left:15px;"> Darul Kirat Mojidiya Fultoli Trust,Fultoli Shaheb Bari,Jokigonj, Sylhet</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-3" style="padding-top: 55px;">
				<span style="margin-left:87px;font-weight: bold;">Porik : {{ $data['hall'] }}</span>
			</div>
			<div class="col-md-6">
				<span style="margin-left: 150px;''
font-size: 20px;">Admit Card</span>
			</div>
			<div class="col-md-3">
				<img src="{{ $data['admit_card']->avatar }}"  style="height:80px;width:80px;margin-left: 37px;">
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12" style="margin-bottom: 20px;" >
			<div class="col-md-10 col-md-offset-1">
				<div class="col-sm-6" >
					<p>Year : {{ $data['year'] }}</p>
					<p>Name : {{ $data['admit_card']->name }}</p>
					<p>Roll: {{ $data['admit_card']->roll_number }}</p>
				</div>
				<div class="col-sm-6" >
					<p>Jamat : Chadis</p>
					<p>Father Name: {{ $data['admit_card']->father_name}}</p>
					<p>Student Type : {{ $data['student_type'] }}</p>
				</div>
			</div>
		</div>
	</div>
</div>

<a href="{{ route('home') }}"> 
<button style="margin-left: 45%; margin-top: 20px;" type="btn btn-primary">Go Back</button>
 </a>

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
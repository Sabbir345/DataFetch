<!DOCTYPE html>
<html>
<head>
    <style>
        .card{
            width: 750px;
            height: 340px;
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

        .content p{
            margin: 5px 0;
        }

        .co1{
            width: 250px;
            float: left;
            padding-left: 135px;
        }

        .co2{
            width: 250px;
            float: left;
            padding-left: 55px;
        }
        .classdate{
                width: 64%;
                padding-left: 36%
         }
         .signature{
                    width: 80%;
                    padding-left: 7%;
                    margin: 36px;
                }
        .signa img{

                height: 40px;
                width: 200px;
                padding-top: 10px;
                margin-top: -35px;
                margin-left: 193px;
            }

    </style>

    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

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
    
    <div class="classdate">
        <span style="padding-right: 5px;"><b>Class:</b> Sadis</span>
        <span><b>Year:</b> {{ $data['year'] }}/1439</span>
     </div>

    <div class="title">
        <div class="admitcard">
            <p>Admit Card</p>
        </div>
    </div><!-- title -->

    <br><br>
    
    <div class="content">
            <div class="co1">

                <p><b>Reg No:</b>{{ $data['admit_card']->roll_number }}</p>
                <p><b>Name:</b> {{ $data['admit_card']->name }}</p>
                @if(isset($data['residential_status']) && !empty($data['residential_status']))
                <p><b>Residential Status:</b> {{ $data['residential_status'] }}</p>
                @endif
                @if(isset($data['hall']) && !empty($data['hall']))
                    <p><b>Farik: {{ $data['hall'] }}</b></p>
                @endif
            </div>
            <div class="co2">
                <p><b>Roll No:</b></p>
                <p><b>Father Name:</b> {{ $data['admit_card']->father_name}} </p>
                <p><b>Student Type:</b> {{ $data['student_type'] }}</p>
                <p><b>Exam Date:</b></p>
                @if(isset($data['exam_date']) && !empty($data['exam_date']))
                    <p><b>Exam Date</b> {{ $data['exam_date'] }}</p>
                @endif
                
            </div>
        </div><!-- content -->
        <div class="signature">
                <span ><b>Student Signature</b></span>  
                <span class="signa">
                    <img src={{ asset('img/sign.jpg') }}>
                    <span style="padding-left: 390px;"><b>Signature</b></span>
                </span>
        </div>
</div><!-- card -->

</body>
</html>
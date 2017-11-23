<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
</head>

<body>
  
<div class="container_custom">

  <h4>Application for Sadis Jamat</h4>

  <div class="input-group custom-input">
    <input type="number" v-model = "rollNumber"placeholder="Registration ID"/>
    <button 
      type="submit" 
      @click="fetchStudentInfo"
      >Submit
    </button>
  </div>

  <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data" id="darul">
      <div class="row">
      
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="hidden" name="student_id" v-model="studentInfo.id">

      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder = "Full Name"
        v-model="studentInfo.name"
        name="name" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="Father's Name"
        v-model="studentInfo.father_name"
        name="father_name" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="Village"
        v-model="studentAddress.village_name" 
        name="village_name" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="Post Office"
        v-model="studentAddress.post_office"
        name="post_office" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="Upozila"
        v-model="studentAddress.upozilla_name"
        name="upozilla_name" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="District"
        v-model="studentAddress.district"
        name="district" readonly
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        placeholder="Home Phone"
        v-model="studentInfo.phone_home"
        name="phone_home" 
        />
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" 
        name="phone_personal" 
        placeholder="Personal Phone"
        v-model="studentInfo.phone_personal"
        name="phone_personal" 
        >
        <div class="input-icon"><i class="fa fa-user"></i></div>`
      </div>
      
       <div class="input-group input-group-icon">
        <input type="email" 
        placeholder="Email Adress"
        v-model="studentInfo.email"
        name="email" 
        />
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
    </div>
    <div class="row">
      
        <h4>Date of Birth</h4>
        <div class="input-group">
          <input type="text" 
          placeholder="Date of Birth"
          v-model="studentInfo.d_o_b"
          name="d_o_b" readonly
          />
        </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Proffesion</h4>
        <div class="input-group">
         <select name="proffession">
            <option value="Student" selected>Student</option>
            <option value="Teacher">Teacher</option>
         </select>
        </div>
      </div>
      <div class="col-half">
        <h4>Student Type</h4>
        <div class="input-group">
         <select name="student_type">
            <option value="Regular" selected>Regular</option>
            <option value="Improvement">Improvement</option>
            <option value="Female">Female</option>
        </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Khamis Devision </h4>
        <div class="input-group">
         <select name="passed_division">
            <option value="First" selected>First</option>
            <option value="Second">Second</option>
            <option value="Third">Third</option>
        </select>
        </div>
      </div>
      <div class="col-half">
        <h4>Class/Designation</h4>
        <div class="input-group">
        <input type="text" name="designation" placeholder="Type here" />
        </div>
      </div>
      <div class="col-half">
        <h4>Khamis Passed Year</h4>
        <div class="input-group">
        <input type="text" name="passed_year" placeholder="YYYY" />
        </div>
      </div>
      <div class="col-half">
        <h4>Residencial Status</h4>
        <div class="input-group">
         <select name="residential_status">
            <option value="Residential">Residencial</option>
            <option value="Non-Residential">Non-Residencial</option>
        </select>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Payment Details of form fee</h4>
      <div class="input-group">
        <input type="radio" name="payment_type" value="BKash" id="payment-method-card" checked="true"/>
        <label for="payment-method-card"><span><i class="fa fa-university"></i>Bkash</span></label>
        <input type="radio" name="payment_type" value="Rocket" id="payment-method-paypal"/>
        <label for="payment-method-paypal"> <span><i class="fa fa-space-shuttle"></i>DBBL Rocket</span></label>
      </div>
      <div class="input-group input-group-icon">
        <input type="number" name="sender_no" placeholder=" Sent NO, Sender No, Txtid"/>  
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>    
      </div>
      <div class="col-half">
       <h4>Upload pp size photo</h4>
      </div>
      <div class="col-half">
      <div class="input-group input-group-icon">
        <input type="file" name="image">
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      </div>
    
    </div>
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the <a href="#">privacy & policy<a/>.</label>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
      <h4>Submit the details to Admin pannel</h4>
      </div>
      <div class="col-half">
      <div class="input-group">
        <button type="submit" value="Submit"  style="
            padding-left: 12px;
            padding-right: 12px;
            padding-bottom: 6px;
            padding-top: 6px;
            margin-top: 18px;
            color: rgba(175, 5, 5, 0.92);
            font-size: 18px;
    font-weight: 700;
            ">Submit</button>
        <button type="reset" value="Reset" style="
            padding-left: 12px;
            padding-right: 12px;
            padding-bottom: 6px;
            padding-top: 6px;
            margin-top: 18px;
            color: #2218c3;
            font-size: 18px;
    font-weight: 700;">Reset</button>
      </div>
      </div>
    </div>
  </form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  {{-- <script src="js/index.js"></script> --}}

 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
      
       new Vue({

        el : '.container_custom',
        delimiters: ['${', '}'],

        data : {
          rollNumber: '',
          studentInfo : {},
          studentAddress: {},
        },

        methods: {
          fetchStudentInfo: function() {
            var that = this;

            axios.get('student/info/'+that.rollNumber)
            .then(function (response) {
              that.studentInfo = response.data[0];
              that.studentAddress = response.data[0].address;
            })
            .catch(function (error) {
              console.log(error);
            });
          }
        }
        
      });

  </script>

</body>
</html>

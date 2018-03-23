<div id="app">
    <div class="row">
        <h4 style="padding-top: 75px; margin-bottom: 20px;">Application for Sadis Jamat</h4>
        <div class="input-group custom-input">
            @if (count($errors) > 0)
                <div>
                    <h2>Please Enter these required field(s)</h2>
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            <form method="post" action="{{ route('admit-card') }}">
                <input type="number" name="roll_number" v-model = "rollNumber" placeholder="Registration ID"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button style="margin-top: 15px;" @click.prevent="fetchStudentInfo">Submit</button>
                <button type="submit" >Get Admit Card</button>
            </form>
        </div>
    </div>

    <div>
        <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
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
                           v-model="studentInfo.village_name"
                           name="village_name" readonly
                    />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text"
                           placeholder="Post Office"
                           v-model="studentInfo.post_office"
                           name="post_office" readonly
                    />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text"
                           placeholder="Upozila"
                           v-model="studentInfo.upozilla_name"
                           name="upozilla_name" readonly
                    />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text"
                           placeholder="District"
                           v-model="studentInfo.district"
                           name="district" readonly
                    />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text"
                           placeholder="Home Phone"
                           name="phone_home"
                    />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text"
                           name="phone_personal"
                           placeholder="Personal Phone"
                           name="phone_personal"
                    >
                    <div class="input-icon"><i class="fa fa-user"></i></div>`
                </div>

                <div class="input-group input-group-icon">
                    <input type="email"
                           placeholder="Email Adress"
                           name="email"
                    />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
            </div>
            <div class="row">

                <h4>Date of Birth</h4>
                <div class="input-group">
                    <input type="text"
                           placeholder="Date of Birth (DD/MM/YY)"
                           name="d_o_b"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col-half">
                    <h4>Profesion</h4>
                    <div class="input-group">
                        <select name="profession">
                            <option value="Student" selected>Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                </div>
                <div class="col-half">
                    <h4>Class/Designation</h4>
                    <div class="input-group">
                        <input type="text" name="designation" placeholder="Type here" />
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
                    <h4>Student Type</h4>
                    <div class="input-group">
                        <select name="student_type">
                            <option value="Regular" selected>Regular</option>
                            <option value="Improvement">Improvement</option>
                            <option value="Female">Female</option>
                            <option value="Irregular">Irregular</option>
                        </select>
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
                            <option value="Residential" selected>Residencial</option>
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

</div>

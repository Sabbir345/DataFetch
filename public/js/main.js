new Vue({

    el : '#app',
    delimiters: ['${', '}'],

    data : {
        rollNumber: '',
        studentInfo : {},
        studentAddress: {},
        errorMessage: {},
    },

    methods: {
        fetchStudentInfo: function() {

            if (this.rollNumber == '') {
                alert('Please Enter Registration ID');
                return;
            }

            var that = this;
            axios.get('student/info/'+that.rollNumber)
                .then(function (response) {
                    that.studentInfo = response.data[0];
                    that.studentAddress = response.data[0].address;
                })
                .catch(function (error) {
                    alert('Wrong Student ID or Student Not Found!');
                });

        }
    }

});
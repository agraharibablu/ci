
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>

/*Start validation error Message*/
$('#student_name').keyup(function(){
	var student_name = $(this).val();
	if (student_name.length < 1) {
     $('#studentNameMsg').html('This field is required');
     } else {
     $('#studentNameMsg').html('');
     }
})
$('#father_name').keyup(function(){
	var father_name = $(this).val();
	if (father_name.length < 1) {
     $('#fatherNameMsg').html('This field is required');
     } else {
    $('#fatherNameMsg').html('');
  }
})
$('#dob').keyup(function(){
	var father_name = $(this).val();
	if (father_name.length < 1) {
     $('#dobMsg').html('This field is required');
    } else {
   $('#dobMsg').html('');
 } 
})
$('#email').keyup(function(){
	var email = $(this).val();
	 if (email.length < 1) {
	$('#emailMsg').html('This field is required');
  } else {
	var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!filter.test(email)) {
	  $('#emailMsg').html('Enter a valid email');
	}else{
		$('#emailMsg').html('');
	}
  }
})
$('#phone_no').keyup(function(){
	var phone_no = $(this).val();
	if (phone_no.length < 1) {
     $('#phoneNoMsg').html('This field is required');
     } else {
      $('#phoneNoMsg').html('');
      }
})
$('#city').keyup(function(){
	var city = $(this).val();
	if (city.length < 1) {
     $('#cityMsg').html('This field is required');
     } else {
      $('#cityMsg').html('');
      }
})
$('#state').keyup(function(){
	var state = $(this).val();
	if (state.length < 1) {
     $('#stateMsg').html('This field is required');
     } else {
      $('#stateMsg').html('');
      }
})
$('#pin').keyup(function(){
	var pin = $(this).val();
	if (pin.length < 1) {
     $('#pinMsg').html('This field is required');
     } else {
      $('#pinMsg').html('');
      }
})
$('#marks').keyup(function(){
	var marks = $(this).val();
	if (marks.length < 1) {
     $('#marksMsg').html('This field is required');
     } else {
      $('#marksMsg').html('');
      }
})
$('#class').change(function(){
	var class1= $(this).val();
	if (class1.length < 1) {
     $('#classMsg').html('This field is required');
     } else {
      $('#classMsg').html('');
      }
})
/*Start Validation Error Message*/

studentData(1);
//for loading grid
function studentData(page){	
	$.ajax({
            data: {},
            type: "post",
            url: "<?= base_url('grid'); ?>/"+page,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {
             $('#tableData').html(res.data);
			 $('#links').html(res.links);
			}
		});
}


//for pagination clicking functionality
$(document).on('click', '.pagination li span a', function(event) {
         event.preventDefault();
         var page = $(this).data('ci-pagination-page');
         studentData(page);
      });



	  // for showing student details
function show(id){
	$.ajax({
            data: {id:id},
            type: "post",
            url: "<?= base_url('student-data'); ?>",
            dataType: 'json',
            success: function(res) {
				$('#studentDetails').html(`<table class="table border">
		<tr>
		<th>Student Name</th>
		<td>${res.student_name}</td>
		</tr>
		<tr>
		<th>Father Name</th>
		<td>${res.father_name}</td>
		</tr>
		<tr>
		<th>DOB</th>
		<td>${res.dob}</td>
		</tr>
		<tr>
		<tr>
		<th>Phone</th>
		<td>${res.phone_no}</td>
		</tr>
		<tr>
		<tr>
		<th>Email</th>
		<td>${res.email}</td>
		</tr>
		<tr>
		<th>Class</th>
		<td>${res.class}</td>
		</tr>
		<tr>
		<th>Marks</th>
		<td>${res.marks}</td>
		</tr>
		<tr>
		<th>City</th>
		<td>${res.city}</td>
		</tr>
		<tr>
		<th>State</th>
		<td>${res.state}</td>
		</tr>
		<tr>
		<th>Pin</th>
		<td>${res.pin}</td>
		</tr>
		<tr>
		<th>Address</th>
		<td>${res.address}</td>
		</tr>
		<tr>
		<th>Enrolled Date</th>
		<td>${res.date_enrolled}</td>
		</tr>
		</table>`);
	        $('#studentDetail').modal('show');
			}
		});
}


// for adding new student open modal
function add(){
	$('form :input').val('');
	        $('#heading').text('Add Student');
			$('#submit').val('Submit');
			$('#exampleModalCenter').modal('show');
}


// for edit new student
function edit(id){
	$.ajax({
            data: {id:id},
            type: "post",
            url: "<?= base_url('edit'); ?>",
            dataType: 'json',
            success: function(res) {
            $('#student_name').val(res.student_name);
			$('#father_name').val(res.father_name);
			$('#dob').val(res.dob);
			$('#phone_no').val(res.phone_no);
			$('#email').val(res.email);
			$('#class').val(res.class);
			$('#marks').val(res.marks);
			$('#city').val(res.city);
			$('#state').val(res.state);
			$('#pin').val(res.pin);
			$('#address').val(res.address);
			$('#id').val(res.id);

			$('#heading').text('Edit Student');
			$('#submit').val('Update');
			$('#exampleModalCenter').modal('show');
			}
		});
}
</script>

<script>
// for inset and update student data
    $("form#studentForm").submit(function(e) {
        e.preventDefault();
	
        var formData = new FormData(this);

        var url = "<?= base_url('save'); ?>";

        $.ajax({
            data: formData,
            type: "post",
            url: url,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(res) {

                /*Start Validation Error Message*/
				if (res.student_name) {
                    $('#studentNameMsg').html(res.student_name);
                } else {
                    $('#studentNameMsg').html('');
                }
                if (res.father_name) {
                    $('#fatherNameMsg').html(res.father_name);
                } else {
                    $('#fatherNameMsg').html('');
                }
                if (res.email) {
                    $('#emailMsg').html(res.email);
                } else {
                    $('#emailMsg').html('');
                }
                if (res.phone_no) {
                    $('#phoneNoMsg').html(res.phone_no);
                } else {
                    $('#phoneNoMsg').html('');
                }
                if (res.city) {
                    $('#cityMsg').html(res.city);
                } else {
                    $('#cityMsg').html('');
                }
                if (res.state) {
                    $('#stateMsg').html(res.state);
                } else {
                    $('#stateMsg').html('');
                }
                if (res.pin) {
                    $('#pinMsg').html(res.pin);
                } else {
                    $('#pinMsg').html('');
                }
				if (res.marks) {
                    $('#marksMsg').html(res.marks);
                } else {
                    $('#marksMsg').html('');
                }
				if (res.class) {
                    $('#classMsg').html(res.class);
                } else {
                    $('#classMsg').html('');
                }
                /*Start Validation Error Message*/

                /*Start Status message*/
                if (res.errorType != 'errorMsg') {
                    swal(res.status, res.text, res.status);
                }
                /*End Status message*/

                //for reset all field 
                if (res.dismis) {
                    $('#studentNameMsg').html('');
					$('#fatherNameMsg').html('');
                    $('#emailMsg').html('');
                    $('#phoneNoMsg').html('');
                    $('#cityMsg').html('');
                    $('#stateMsg').html('');
                    $('#pinMsg').html('');
					$('#classMsg').html('');
                    $('#marksMsg').html('');
                    $('form :input').val('');
					$('#exampleModalCenter').modal('hide');
					studentData(1);
                }
            }
        });
    });
</script>

</body>
</html>
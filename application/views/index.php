<body>
<div class="container py-4">
<div class="border p-4">
<div class="row mb-4">
<div class="col-md-6">
<button class="btn btn-sm btn-info">Enrolment</button>
</div>
<div class="col-md-6 text-right">
<button type="button" class="btn btn-sm btn-success" onclick="add()">New Student</button>
</div>
</div>


<div class="row">
<div class="col-md-12">
<table class="table table-hover border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone#</th>
	  <th scope="col">Class</th>
	  <th scope="col">Marks%</th>
	  <th></th>
    </tr>
  </thead>
  <tbody id="tableData">
   
  </tbody>
</table>
<div class="row" id="links">
</div>
</div>
</div>
</div>
</div>


<!-- start student details modal-->
<div class="modal fade" id="studentDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-3" id="studentDetails">
		
		</div>
      </div>
    </div>
  </div>
</div>
<!-- end student details modal-->


<!--Start Modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="heading"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
	<form id="studentForm" ccept-charset="utf-8">
	
	<input type="hidden" id="id" name='id'>

	<div class="form-row">
	<div class="form-group col-md-6">
	<label>Student Name</label>
	<input type="text" name="student_name" class="form-control" id="student_name" placeholder="Student Name">
	<span class="text-danger" id="studentNameMsg"></span>
	</div>

	<div class="form-group col-md-6">
	<label>Father's Name</label>
	<input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father Name">
	<span class="text-danger" id="fatherNameMsg"></span>
	</div>
	</div>


	<div class="form-row">
	<div class="form-group col-md-6">
	<label>DOB</label>
	<input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
	
	</div>
	<div class="form-group col-md-6">
	<label>Phone No</label>
	<input type="number" name="phone_no" class="form-control" id="phone_no" placeholder="Phone No">
	<span class="text-danger" id="phoneNoMsg"></span>
	</div>
	</div>

	<div class="form-row">
	<div class="form-group col-md-6">
	<label>Email</label>
	<input type="email" name="email" class="form-control" id="email" placeholder="Email">
	<span class="text-danger" id="emailMsg"></span>
	</div>
	<div class="form-group col-md-6">
	<label>Class</label>
	<!-- <input type="number"> -->
	<select name="class" class="form-control" id="class" placeholder="Class">
	<option value="">Select</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	</select>
	<span class="text-danger" id="classMsg"></span>
	</div>
	</div>


		<div class="form-row">

		<div class="col-md-6">
		<div class="form-group">
			<label>Marks</label>
			<input type="number" name="marks" class="form-control" id="marks" placeholder="Marks">
			<span class="text-danger" id="marksMsg"></span>
			</div>
			<div class="form-group">
			<label>City</label>
			<input type="text" name="city" class="form-control" id="city" placeholder="City">
			<span class="text-danger" id="cityMsg"></span>
			</div>
			<div class="form-group">
			<label>State</label>
			<input type="text" name="state" class="form-control" id="state" placeholder="State">
			<span class="text-danger" id="stateMsg"></span>
			</div>
			<div class="form-group">
			<label>Pin</label>
			<input type="number" name="pin" class="form-control" id="pin" placeholder="Pin">
			<span class="text-danger" id="pinMsg"></span>
			</div>
		</div>

		<div class="col-md-6">
		<div class="form-group">
		<label>Address</label>
		<textarea class="form-control" id="address" rows="13" name="address" placeholder="Address"></textarea>
		</div>
		</div>

		</div>

		<div class="form-group">
		<input type="submit" class="btn btn-sm btn-success" id="submit" value="Submit">
		</div>

	   </form>

      </div>
    </div>
  </div>
</div>
<!--End Modal-->






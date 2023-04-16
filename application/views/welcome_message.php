<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">




	<title>Crud Operation</title>
</head>

<body>
	<div class="container">
		<div class="col-md-12 mt-4 text-center">
			<h1>Crud operation using AJAX</h1>
		</div>
		<hr>


		<div class="row">
			<div class="col-md-6">
				<h3>Personal Informarion</h3>
			</div>
			<div class="col-md-6 text-right">
				<button type="button" class="btn btn-primary" id="create" data-toggle="modal">
					Create
				</button>
				<!-- Button trigger modal -->
			</div>
		</div>
		<hr>
		<div class="col-md-12 mt-3">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Address</th>
						<th scope="col">Gender</th>
						<th scope="col">Education</th>
						<th scope="col">Action</th>




					</tr>
				</thead>
				<tbody id="tbody">
					<tr>

					</tr>
				</tbody>
			</table>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addTitle">Add</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" name="modalform" id="modalform">
						<div class="modal-body">
							<input type="hidden" id="modal_id" value="">

							<!-- insert here form  -->
							<div class="form-group">
								<label for="exampleInputName1">First Name</label>
								<input type="text" name="firstname" class="form-control" id="firstname" required>
								<p class="firstnameError"></p>
							</div>
							<div class="form-group">
								<label for="exampleInputName1">Last Name</label>
								<input type="text" name="lastname" class="form-control" id="lastname" required>
								<p class="lastnameError"></p>

							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" name="email" class="form-control" data-validation="required email" id="email" required>
								<p class="emailError"></p>

							</div>
							<div class="form-group">
								<label for="exampleInputAddress1">Address</label>
								<input type="address" class="form-control" id="address" name="address">
								<p class="addressError"></p>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<div class="div">
									<input type="radio" name="gender" id="edit_female" class="gender" value="Female"> Female
									<input type="radio" name="gender" id="edit_male" class="gender" value="Male"> Male
								</div>
								<p class="genderError"></p>
							</div>
							<div class="form-group">
								<label>Education</label>
								<select class="form-control" name="education" id="education">
									<option value="Primary">Primary</option>
									<option value="Secondary">Secondary</option>
									<option value="Bachelor">Bachelor</option>
									<option value="Master">Master</option>
								</select>
								<p class="educationError"></p>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="add">Add</button>

				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="alertmodal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Alert</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- insert here form  -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
				</div>
			</div>
		</div>
	</div>
	</div>






	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

	<script>
		$(document).on("click", "#create", function(e) {
			e.preventDefault();
			$("#exampleModal").modal("show");
			$('#addTitle').html("Add");

			$('#add').html("Save");

			$('#modal_id').val("");
			$("#modalform")[0].reset();



		});
	</script>

	<script>
		$(document).on("click", "#add", function(e) {
			e.preventDefault();

			var modal_id = $("#modal_id").val();
			var url = (modal_id == "") ? "<?php echo base_url('insert'); ?>" : "<?php echo base_url('update'); ?>";
			// console.log(({
			// 	modal_id,
			// 	url
			// }));
			var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var email = $("#email").val();
			var address = $("#address").val();
			//  or by taking input name //var address = $("input[name='address']").val()
			var gender = $("input[name='gender']:checked").val();
			// or by taking  input type // var gender = $('input[type="radio"]:checked').val();
			var education = $("#education").val();
			// alert(modal_id);



			if (firstname == "") {
				alert('Please enter your Firstname.');
				return false;
			}
			if (lastname == "") {
				alert('Please enter your lastname.');
				return false;
			}
			if (email == '') {
				alert('Email address is required.');
				return false;
			} else if (!pattern.test(email)) {
				alert('Please enter a valid email address.');
				return false;
			}
			if (address == "") {
				alert('Please enter your address.');
				return false;
			}

			if ($('input[name="gender"]:checked').length == 0) {
				alert('Please select a gender.');
				return false;
			}

			// if (gender == "") {
			// 	alert('Please enter your gender.');
			// 	return false;
			// }
			if (education == "") {
				alert('Please enter your education.');
				return false;
			}


			// if ($('#lastname').val() == '') {
			// 	alert('Please enter your Last Name.');
			// 	return false;
			// }

			// if ($('#email').val() == '') {
			// 	alert('Please enter your email address.');
			// 	return false;
			// }

			// if ($('#address').val() == '') {
			// 	alert('Please enter a Address.');
			// 	return false;
			// }
			// if ($('gender').val() == '') {
			// 	alert('Please select Gender.');
			// 	return false;
			// }


			$.ajax({
				url: url,
				type: "post",
				dataType: "json",
				data: {
					modal_id: modal_id,
					firstname: firstname,
					lastname: lastname,
					email: email,
					address: address,
					gender: gender,
					education: education
				},
				success: function(response) {
					$('#modal_id').val("");
					$('#addTitle').text("add");
					$('#add').html("Save");



					if (response['status'] == 0) {

						if (response["first"] != " ") {
							$(".firstnameError").html(response["first"]).addClass('invalid-feedback d-block');

							// $('#firstname').addClass('is-invalid');
						} else {
							$(".firstnameError").html("").removeClass('invalid-feedback d-block');
							// $('#firstname').removeClass('is-invalid');

						}


						if (response["lastname"] != " ") {
							$(".lastnameError").html(response["lastname"]).addClass('invalid-feedback d-block');
							// $('#lastname').addClass('is-invalid');
						} else {
							$(".lastnameError").html(" ").removeClass('invalid-feedback d-block');
							// $('#lastname').removeClass('is-invalid');
						}

						if (response["email"] != " ") {
							$(".emailError").html(response["email"]).addClass('invalid-feedback d-block');
							// $('#email').addClass('is-invalid');
						} else {
							$(".emailError").html(" ").removeClass('invalid-feedback d-block');
							// $('#email').removeClass('is-invalid');
						}

						if (response["address"] != " ") {
							$(".addressError").html(response["address"]).addClass('invalid-feedback d-block');
							// $('#address').addClass('is-invalid');
						} else {
							$(".addressError").html(" ").removeClass('invalid-feedback d-block');
							// $('#address').removeClass('is-invalid');
						}
						if (response["gender"] != " ") {
							$(".genderError").html(response["gender"]).addClass('invalid-feedback d-block');
							// $('#gender').addClass('is-invalid');
						} else {
							$(".educationError").html(" ").removeClass('invalid-feedback d-block');
							// $('#gender').removeClass('is-invalid');
						}
						if (response["education"] != " ") {
							$(".educationError").html(response["education"]).addClass('invalid-feedback d-block');
							// $('#education').addClass('is-invalid');
						} else {
							$(".educationError").html(" ").removeClass('invalid-feedback d-block');
							// $('#education').removeClass('is-invalid');
						}
					} else {
						$(".firstnameError").html("").removeClass('invalid-feedback d-block');
						$(".lastnameError").html("").removeClass('invalid-feedback d-block');
						$(".emailError").html("").removeClass('invalid-feedback d-block');
						$(".addressError").html("").removeClass('invalid-feedback d-block');
						$(".genderError").html("").removeClass('invalid-feedback d-block');
						$(".educationError").html("").removeClass('invalid-feedback d-block');


						fetch();
						$("#exampleModal").modal("hide");
						$("#alertmodal .modal-body").html(response["msg"]);
						// alert("record added sucessfully");  at top localhost say alert message
						$("#alertmodal").modal("show");
					}

					$("#modalform")[0].reset();

				},

			});

		});


		function fetch() {
			$.ajax({
				url: "<?php echo base_url() . 'fetch' ?>",
				dataType: "json",
				type: "post",
				success: function(response) {
					// console.log(response);
					var tbody = "";
					var i = "1";
					for (var key in response) {
						tbody += "<tr>";
						tbody += "<td>" + i++ + "</td>";
						tbody += "<td>" + response[key]['firstName'] + "</td>";
						tbody += "<td>" + response[key]['lastName'] + "</td>";
						tbody += "<td>" + response[key]['email'] + "</td>";
						tbody += "<td>" + response[key]['address'] + "</td>";
						tbody += "<td>" + response[key]['gender'] + "</td>";
						tbody += "<td>" + response[key]['education'] + "</td>";
						tbody += `<td>
						<a href="#" id="edit" class="btn btn-primary"  value="${response[key]['id']}">Edit</a>
						<a href="#" id="del"  class="btn btn-danger" value="${response[key]['id']}">Delete</a>
						</td>`;
						tbody += "<tr>";
					}
					$("#tbody").html(tbody);
				}

			});
		}
		fetch();


		$(document).on("click", "#del", function() {
			// alert("delete");
			if (!confirm("Do you want to delete")) {
				return false;
			} else {
				var del_id = $(this).attr('value');
				// alert(del_id);

				$.ajax({
					url: "<?php echo base_url() . 'del'; ?>",
					type: 'post',
					dataType: 'json',
					data: {
						del_id: del_id
					},
					success: function(response) {
						$("#alertmodal").modal("show");
						$("#alertmodal .modal-body").html(response["delete"]);
						fetch();
					},
				});
			}
		});



		$(document).on("click", "#edit", function() {
			// alert("edit");

			var edit_id = $(this).attr('value');
			// alert(edit_id);
			$.ajax({
				url: "<?php echo base_url() . 'edit'; ?>",
				type: 'post',
				dataType: 'json',
				data: {
					edit_id: edit_id
				},
				success: function(data) {
					// console.log(data);
					$('#addTitle').html("Edit");
					// $('#add').html("Save");

					$('#add').html("update");



					$("#modal_id").val(data.id);
					$("#firstname").val(data.firstName);
					$("#lastname").val(data.lastName);
					$("#email").val(data.email);
					$("#address").val(data.address);


					if (data.gender == 'Male') {
						$("#edit_male").prop("checked", true);
					} else if (data.gender == 'Female') {
						$("#edit_female").prop("checked", true);
					}
					// 	// 	// alert(card_type);


					if (data.education == 'Primary') {
						$("#education").val(data.education);
					}
					if (data.education == 'Secondary') {
						$("#education").val(data.education);
					}
					if (data.education == 'Bachelor') {
						$("#education").val(data.education);
					}
					if (data.education == 'Master') {
						$("#education").val(data.education);
					}
					$("#exampleModal").modal("show");
				},
			});
		});

		// $(document).on("click", "#update", function(e) {
		// 	e.preventDefault();
		// 	// alert("update");
		// 	var editid = $("#modal_id").val();
		// 	var editfirstname = $("#firstname").val();
		// 	var editlastname = $("#lastname").val();
		// 	var editemail = $("#email").val();
		// 	var editaddress = $("#address").val();
		// 	var editgender = $("input[name='gender']:checked").val();
		// 	// console.log(editgender);

		// 	// var gender = $("input[name='gender']").val();
		// 	var editeducation = $("#education").val();
		// 	// alert(editid);
		// 	$.ajax({
		// 		url: "<?php echo base_url() . 'update'; ?>",
		// 		dataType: "json",
		// 		type: "post",
		// 		data: {
		// 			editid: editid,
		// 			editfirstname: editfirstname,
		// 			editlastname: editlastname,
		// 			editemail: editemail,
		// 			editaddress: editaddress,
		// 			editgender: editgender,
		// 			editeducation: editeducation,
		// 		},
		// 		success: function(data) {
		// 			// console.log({
		// 			// 	editfirstname,
		// 			// 	editgender
		// 			// });
		// 			$("#editmodal").modal("hide");

		// 			fetch();
		// 		},



		// 	});

		// });
	</script>

</body>

</html>
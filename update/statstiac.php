<?php
session_start();
if (!isset($_SESSION['teacher_id'])) {
    header('Location: login.php');
    exit();
}

include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<style>
    td, th {

  text-align: center;

}

    </style>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         added successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
<ul class="navbar-nav ml-auto">
<li class="nav-item">
    <h5 class="nav-title ">Import Statstic From Excel</h5>
</li>
</ul>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <!-- Hidden file input for Excel import -->
            <input type="file" id="excelFileInput" style="display: none;">
            <!-- Custom styled import button -->
            <button class="btn btn-primary" name="importButton" id="importButton">Import from Excel</button>
            <button class="btn btn-primary" name="saveButton" id="saveButton">Save</button>

        </li>
    </ul>
</nav>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Subject Number</th>
                    <th>Subject Name</th>
                    <th>Number of Students in Mandatory</th>
                    <th>Number of Students in Optional</th>
                </tr>
            </thead>
            <tbody id="tbl-content">
            </tbody>
        </table>
        <button id="delete"  class="btn btn-primary "> Delete last statistics </button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#delete").click(function(){
//    $("#delete").preventDefault();
alert('selete sucss')
    window.location.href='php/delete_statstic.php';
   });
    $(document).ready(function () {
        let importedData;

        // Trigger file input click when import button is clicked
        $("#importButton").on("click", function () {
            $("#excelFileInput").click();
        });

        // Process the selected file
        $("#excelFileInput").on("change", function (e) {
            var file = e.target.files[0];

            // Check if a file is selected and validate its type
            if (file && (file.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || file.type === "application/vnd.ms-excel")) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, { type: "array" });
                    var sheetName = workbook.SheetNames[0];
                    var sheet = workbook.Sheets[sheetName];
                    importedData = XLSX.utils.sheet_to_json(sheet, { header: 1 });
                    displayDataInTable(importedData);

                };

                reader.readAsArrayBuffer(file);
            } else {
                alert("Please upload a valid Excel file.");
            }
        });

        // Save button functionality
$("#saveButton").on("click", function () {
    // Check if there are imported data
    if (importedData) {
        // Save data via AJAX POST request
        $.post("php/save_data.php", { importedData: importedData }, function (response) {
            $('#successModal').modal('show');
        }).fail(function() {
            alert("Error saving data.");
        });
    } else {
        alert("No data to save.");
    }
});

        // Function to display data in the table
        function displayDataInTable(data) {
            // Remove existing rows
            $("#dataTable tbody").empty();

            // Append new rows based on imported data
            for (let i = 1; i < data.length; i++) {
        let rowData = data[i].map(cell => `<td>${cell}</td>`).join('');
        $("#dataTable tbody").append(`<tr>${rowData}</tr>`);
    }

            $("#saveButton").prop("disabled", false);
        }

        // Save button functionality
        // $("#saveButton").on("click", function () {
        //     console.log("Data to save:", importedData);
        //     alert("Data saved successfully!");
        // });

        // Back button functionality (if needed)
        $("#backButton").on("click", function () {
            history.back();
        });
    });
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

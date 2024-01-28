$(document).ready(function () {
    $("#reservationForm").submit(function (event) {
      event.preventDefault();
  
      var formData = {
        date: $("#date").val(),
        name: $("#name").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        partysize: $("#partysize").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "reservation.php",
        data: formData,
        dataType: "json",
        success: function (tableInfo) {
          if (tableInfo.table_state === 1) {
            Swal.fire({
              title: "Table Reserved",
              text: "Sorry, the selected table is already reserved. Please choose another table.",
              type: "warning",
            });
          } else if (parseInt(tableInfo.table_guestno) >= parseInt(formData.partysize)) {
            Swal.fire({
              title: "Table Not Available",
              text: "Sorry, the selected table is not available for the party size. Please choose another table.",
              type: "warning",
            });
          } else {
            Swal.fire({
              title: "Reservation Successful",
              text: "Reservation successful for table " + tableInfo.selectedTable + "!",
              type: "success",
            });
          }
        },
        error: function (error) {
          console.log("Error fetching table information: " + error);
        },
      });
    });
  });
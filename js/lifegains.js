function signIn() {
  successtoast("Welcome to lifegains Dashboard");
  setTimeout(function () {
    window.parent.location.href = "dashboard.html";
  }, 2000);
}
function signUp() {
  var selectedItem = document.getElementById("plan");

  var plan = selectedItem.options[selectedItem.selectedIndex].innerHTML;
  var amount = selectedItem.options[selectedItem.selectedIndex].value;

  if (amount == "") {
    errortoast("Please pick a plan!");
  } else {
    if (confirm("Kindly confirm you selected plan " + plan)) {
      payWithPaystack(amount);
    }
  }
}
function payWithPaystack(amount) {
  var handler = PaystackPop.setup({
    key: "pk_live_0288c7a29cb61d238268847a25130c73c92cb31f", //put your public key here
    email: "ademoladebayo54@email.com", //put your customer's email here
    amount: amount * 100, //amount the customer is supposed to pay
    currency: "NGN",
    metadata: {
      custom_fields: [
        {
          display_name: "Mobile Number",
          variable_name: "mobile_number",
          value: "+2348133968949", //customer's mobile number
        },
      ],
    },
    callback: function (response) {
      //after the transaction have been completed
      //make post call  to the server with to verify payment
      //using transaction reference as post data
      $.post(
        "verify.php",
        { reference: response.reference },
        function (status) {
          if (status == "success")
            //successful transaction
            alert("Transaction was successful");
          //transaction failed
          else alert(response);
        }
      );
    },
    onClose: function () {
      //when the user close the payment modal
      alert("Transaction cancelled");
    },
  });
  handler.openIframe(); //open the paystack's payment modal
}

// TOAST
function successtoast(message, time) {
  toastr.success(message, "", {
    timeOut: time,
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-top-center",
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  });
}
function warningtoast(message, time) {
  toastr.warning(message, "", {
    positionClass: "toast-top-center",
    timeOut: time,
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  });
}
function errortoast(message, time) {
  toastr.error(message, "", {
    positionClass: "toast-top-center",
    timeOut: time,
    closeButton: true,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  });
}

$(document).ready(function() {
    $('#sign-up-form').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        $.ajax({
            type: 'POST',
            url: 'sign_up.php', // The PHP file where your code resides
            data: $(this).serialize(), // Serialize form data
            dataType: 'json', // Expect JSON response
            success: function(response) {
                if (response.status === 'success') {

                  window.location.href = 'user/index.php';
                  
                } else {
                    // Handle error response
                    console.error(response.message); // Log the error message for debugging
                    // Show SweetAlert2 toast with error message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                let timerInterval;
Swal.fire({
  title: "Signed In",
  html: "Redirecting..",
  icon: "success",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("I was closed by the timer");
  }
})
setTimeout(function() {
                    window.location.href = 'user/index.php';
                }, 2050);
                
            }
        });
    });
});

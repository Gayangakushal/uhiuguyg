gsap.fromTo(
  ".logo-name",
  {
    y: 50,
    opacity: 0,
  },
  {
    y: 0,
    opacity: 1,
    duration: 2,
    delay: 0.5,
  }

);

function signOut() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // Replace default alert with SweetAlert2
      Swal.fire({
        title: 'Signed Out',
        text: response,
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload(); // Reload the page after alert is confirmed
        }
      });
    }
  };
  request.open("POST", "signOutProcess.php", true);
  request.send();

  function loadChart() {
    // alert("ok");
    const ctx = document.getElementById('myChart');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            //alert(responce);
            var data = JSON.parse(responce);
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            
        }
};

request.open("POST","loadChartProcess.php",true);
request.send();
}
}


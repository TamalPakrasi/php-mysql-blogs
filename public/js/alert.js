window.alertSection = function () {
  const alertSec = $("#alert-sec");

  if (alertSec[0]) {
    setTimeout(() => {
      alertSec.remove();
    }, 5000);
  }
};

alertSection();

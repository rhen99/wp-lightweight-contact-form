document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const messageBox = document.querySelector(".lcf-message");
  const submitButton = form.querySelector("button[type='submit']");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append("action", "lcf_submit_form");

    submitButton.disabled = true;
    submitButton.textContent = "Sending...";
    messageBox.textContent = "";
    messageBox.className = "";
    fetch(lcf_ajax.ajax_url, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          messageBox.textContent = data.data.message;
          messageBox.className = "success";
          form.reset();
        } else {
          messageBox.textContent = data.data.message || "Something went wrong";
          messageBox.className = "error";
        }
      })
      .catch(() => {
        messageBox.textContent = "Network error. Please try again.";
        messageBox.className = "error";
      })
      .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = "Send Message";
      });
  });
});

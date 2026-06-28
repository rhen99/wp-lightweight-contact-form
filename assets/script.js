document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const messageBox = document.querySelector(".form-message");
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
          messageBox.className = "form-message success";
          form.reset();
        } else {
          const errors = JSON.parse(data.data.message);
          const errorList = document.createElement("ul");
          errors.forEach((error) => {
            const listItem = document.createElement("li");
            listItem.textContent = error;
            errorList.appendChild(listItem);
          });
          messageBox.appendChild(errorList);
          messageBox.className = "form-message error";
        }
      })
      .catch(() => {
        messageBox.textContent = "Network error. Please try again.";
        messageBox.className = "form-message error";
      })
      .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = "Send Message";
      });
  });
});

function togglePasswordVisibility(fieldId, iconId) {
  const field = document.getElementById(fieldId);
  const icon = document.getElementById(iconId);
  if (field.type === "password") {
    field.type = "text";
    icon.setAttribute("data-icon", "tabler:eye");
  } else {
    field.type = "password";
    icon.setAttribute("data-icon", "tabler:eye-closed");
  }
}
function checkModalIsValid() {
  console.log("checkModalIsValid");
  const newuser = document.getElementById("newuser").value.trim();
  const newpass = document.getElementById("newpass").value.trim();
  const newpass_confirm = document
    .getElementById("newpass_confirm")
    .value.trim();

  if (newuser) {
    fetch(`action/user.php?checkuser=${encodeURIComponent(newuser)}`)
      .then((response) => response.text())
      .then((data) => {
        data = data.trim();
        console.log("Réponse du serveur :", data);
        const submitBtn = document.getElementById("submitBtn");
        let errorMsg = document.getElementById("error-msg");
        if (data === "exist") {
          if (!errorMsg) {
            errorMsg = document.createElement("div");
            errorMsg.id = "error-msg";
            errorMsg.className = "text-red-500 text-sm mb-2";
            submitBtn.parentNode.insertBefore(errorMsg, submitBtn);
          }
          errorMsg.textContent = "Cet identifiant est déjà utilisé";
        } else {
          if (errorMsg) {
            errorMsg.remove();
          }
        }
      })
      .catch((err) => console.error(err));
  }

  if (newpass) {
    const submitBtn = document.getElementById("submitBtn");
    let errorMsgPassword = document.getElementById("error-msg-password");
    if (newpass !== newpass_confirm) {
      if (!errorMsgPassword) {
        errorMsgPassword = document.createElement("div");
        errorMsgPassword.id = "error-msg-password";
        errorMsgPassword.className = "text-red-500 text-sm mb-2";
        submitBtn.parentNode.insertBefore(errorMsgPassword, submitBtn);
      }
      errorMsgPassword.textContent = "Vos mots de passe ne correspondent pas";
    } else {
      if (errorMsgPassword) {
        errorMsgPassword.remove();
      }
    }
  }
}

function checkModalIsValidConfirm(event) {
  console.log("checkModalIsValid");
  const newuser = document.getElementById("newuser").value.trim();
  const newpass = document.getElementById("newpass").value.trim();
  const newpass_confirm = document
    .getElementById("newpass_confirm")
    .value.trim();
  let isValid = true;

  if (newuser) {
    fetch(`action/user.php?checkuser=${encodeURIComponent(newuser)}`)
      .then((response) => response.text())
      .then((data) => {
        data = data.trim();
        console.log("Réponse du serveur :", data);
        if (data === "exist") {
          isValid = false;
        }
      })
      .catch((err) => {
        console.error(err);
        isValid = false;
      });
  }

  if (newpass && newpass !== newpass_confirm) {
    isValid = false;
  }

  if (!isValid) {
    event.preventDefault();
  }

  return isValid;
}

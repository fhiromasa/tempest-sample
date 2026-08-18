// Post form elements
const togglePostFormBtn = document.getElementById("toggle-post-form");
const postFormContainer = document.getElementById("post-form-container");
const postForm = document.getElementById("post-form");
const closePostFormBtn = document.getElementById("close-post-form");
const cancelPostBtn = document.getElementById("cancel-post");

// Toggle post form visibility
function togglePostForm(show) {
  if (show) {
    postFormContainer.classList.remove("hidden");
    togglePostFormBtn.style.display = "none";
  } else {
    postFormContainer.classList.add("hidden");
    togglePostFormBtn.style.display = "flex";
    postForm.reset();
  }
}

// Toggle post form
togglePostFormBtn.addEventListener("click", () => {
  togglePostForm(true);
});

// Close post form
closePostFormBtn.addEventListener("click", () => {
  togglePostForm(false);
});

// Cancel post
cancelPostBtn.addEventListener("click", () => {
  togglePostForm(false);
});

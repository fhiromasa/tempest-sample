// Sample data - Posts and Comments
// Utility functions
function formatDate(dateString) {
  const date = new Date(dateString);
  const now = new Date();
  const diffMs = now - date;
  const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
  const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
  const diffMinutes = Math.floor(diffMs / (1000 * 60));

  if (diffMinutes < 60) {
    return `${diffMinutes}分前`;
  } else if (diffHours < 24) {
    return `${diffHours}時間前`;
  } else if (diffDays < 7) {
    return `${diffDays}日前`;
  } else {
    return date.toLocaleDateString("ja-JP", {
      year: "numeric",
      month: "short",
      day: "numeric",
    });
  }
}

function getAvatarColor(initial) {
  const colors = [
    "linear-gradient(135deg, #ff6b35, #e74c3c)",
    "linear-gradient(135deg, #3498db, #2980b9)",
    "linear-gradient(135deg, #9b59b6, #8e44ad)",
    "linear-gradient(135deg, #1abc9c, #16a085)",
    "linear-gradient(135deg, #f39c12, #e67e22)",
    "linear-gradient(135deg, #e91e63, #c2185b)",
  ];
  const index = initial.charCodeAt(0) % colors.length;
  return colors[index];
}

// SVG Icons
const icons = {
  upvote: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M12 19V5"></path>
    <path d="M5 12l7-7 7 7"></path>
  </svg>`,
  comment: `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
  </svg>`,
};

// Render functions
function renderPostCard(post) {
  return `
    <article class="post-card" data-post-id="${post.id}">
      <div class="post-header">
        <div class="post-avatar" style="background: ${getAvatarColor(post.authorInitial)}">${post.authorInitial}</div>
        <div class="post-meta">
          <span class="post-author">${post.author}</span>
          <span class="post-time">${formatDate(post.createdAt)}</span>
        </div>
      </div>
      <h3 class="post-title">${post.title}</h3>
      <p class="post-content">${post.content}</p>
      <div class="post-stats">
        <div class="stat">
          ${icons.upvote}
          <span class="stat-votes">${post.votes}</span>
        </div>
        <div class="stat">
          ${icons.comment}
          <span>${post.commentCount} コメント</span>
        </div>
      </div>
    </article>
  `;
}

function renderPostDetail(post) {
  return `
    <article class="post-detail">
      <div class="post-header">
        <div class="post-avatar" style="background: ${getAvatarColor(post.authorInitial)}">${post.authorInitial}</div>
        <div class="post-meta">
          <span class="post-author">${post.author}</span>
          <span class="post-time">${formatDate(post.createdAt)}</span>
        </div>
      </div>
      <h2 class="post-title">${post.title}</h2>
      <p class="post-content full">${post.content}</p>
      <div class="post-stats">
        <div class="stat">
          ${icons.upvote}
          <span class="stat-votes">${post.votes}</span>
        </div>
        <div class="stat">
          ${icons.comment}
          <span>${post.commentCount} コメント</span>
        </div>
      </div>
    </article>
  `;
}

function renderComment(comment, isReply = false, level = 0) {
  const replyClass = isReply
    ? level > 1
      ? "reply reply-level-2"
      : "reply"
    : "";
  return `
    <div class="comment ${replyClass}" data-comment-id="${comment.id}">
      <div class="comment-header">
        <div class="comment-avatar" style="background: ${getAvatarColor(comment.authorInitial)}">${comment.authorInitial}</div>
        <span class="comment-author">${comment.author}</span>
        <span class="comment-time">${formatDate(comment.createdAt)}</span>
      </div>
      <p class="comment-body">${comment.content}</p>
      <div class="comment-votes">
        ${icons.upvote}
        <span class="votes-count">${comment.votes}</span>
        ポイント
      </div>
    </div>
  `;
}

function renderComments(comments) {
  // Group comments by parent
  const rootComments = comments.filter((c) => c.parentId === null);
  const repliesMap = {};

  comments.forEach((comment) => {
    if (comment.parentId !== null) {
      if (!repliesMap[comment.parentId]) {
        repliesMap[comment.parentId] = [];
      }
      repliesMap[comment.parentId].push(comment);
    }
  });

  let html = "";

  rootComments.forEach((comment) => {
    html += renderComment(comment, false, 0);

    // Render replies
    if (repliesMap[comment.id]) {
      repliesMap[comment.id].forEach((reply) => {
        html += renderComment(reply, true, 1);

        // Render nested replies (level 2)
        if (repliesMap[reply.id]) {
          repliesMap[reply.id].forEach((nestedReply) => {
            html += renderComment(nestedReply, true, 2);
          });
        }
      });
    }
  });

  return (
    html || '<div class="empty-state"><p>まだコメントはありません</p></div>'
  );
}

// App state
let currentView = "home";
let currentPostId = null;
let nextPostId = 6; // For generating new post IDs
let nextCommentId = 600; // For generating new comment IDs

// DOM elements
const postListView = document.getElementById("post-list-view");
const postDetailView = document.getElementById("post-detail-view");
const postsContainer = document.getElementById("posts-container");
const postDetailContainer = document.getElementById("post-detail-container");
const commentsContainer = document.getElementById("comments-container");
const backButton = document.getElementById("back-button");

// Post form elements
const togglePostFormBtn = document.getElementById("toggle-post-form");
const postFormContainer = document.getElementById("post-form-container");
const postForm = document.getElementById("post-form");
const closePostFormBtn = document.getElementById("close-post-form");
const cancelPostBtn = document.getElementById("cancel-post");

// Comment form elements
const commentForm = document.getElementById("comment-form");
const replyToSelect = document.getElementById("reply-to");

// View switching
function showView(viewName) {
  currentView = viewName;

  if (viewName === "home") {
    postListView.classList.add("active");
    postDetailView.classList.remove("active");
    currentPostId = null;
    // Update URL
    history.pushState({ view: "home" }, "", "/");
  } else if (viewName === "detail") {
    postListView.classList.remove("active");
    postDetailView.classList.add("active");
    // Update URL
    history.pushState(
      { view: "detail", postId: currentPostId },
      "",
      `#post-${currentPostId}`,
    );
  }
}

// Update reply-to select options
function updateReplyToOptions(comments) {
  replyToSelect.innerHTML = '<option value="">新規コメント</option>';

  comments.forEach((comment) => {
    const option = document.createElement("option");
    option.value = comment.id;
    option.textContent = `@${comment.author}: ${comment.content.substring(0, 30)}...`;
    replyToSelect.appendChild(option);
  });
}

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

// Create new post
function createPost(author, title, content) {
  const newPost = {
    id: nextPostId++,
    author: author,
    authorInitial: author.charAt(0).toUpperCase(),
    title: title,
    content: content,
    votes: 0,
    commentCount: 0,
    createdAt: new Date().toISOString(),
  };

  postsData.unshift(newPost);
  commentsData[newPost.id] = [];

  return newPost;
}

// Create new comment
function createComment(postId, author, content, parentId = null) {
  const newComment = {
    id: nextCommentId++,
    author: author,
    authorInitial: author.charAt(0).toUpperCase(),
    content: content,
    votes: 0,
    createdAt: new Date().toISOString(),
    parentId: parentId ? parseInt(parentId, 10) : null,
  };

  if (!commentsData[postId]) {
    commentsData[postId] = [];
  }

  commentsData[postId].push(newComment);

  // Update post comment count
  const post = postsData.find((p) => p.id === postId);
  if (post) {
    post.commentCount++;
  }

  return newComment;
}

// Show success message
function showSuccessMessage(container, message) {
  const successDiv = document.createElement("div");
  successDiv.className = "success-message";
  successDiv.innerHTML = `
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    ${message}
  `;

  container.insertBefore(successDiv, container.firstChild);

  setTimeout(() => {
    successDiv.remove();
  }, 3000);
}

// Event listeners
function setupEventListeners() {
  // Post click
  postsContainer.addEventListener("click", (e) => {
    const postCard = e.target.closest(".post-card");
    if (postCard) {
      const postId = parseInt(postCard.dataset.postId, 10);
      currentPostId = postId;
      loadPostDetail(postId);
      showView("detail");
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  });

  // Back button
  backButton.addEventListener("click", () => {
    showView("home");
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  // Browser navigation
  window.addEventListener("popstate", (e) => {
    if (e.state && e.state.view === "detail") {
      currentPostId = e.state.postId;
      loadPostDetail(currentPostId);
      showView("detail");
    } else {
      showView("home");
    }
  });

  // Handle initial URL
  const hash = window.location.hash;
  if (hash && hash.startsWith("#post-")) {
    const postId = parseInt(hash.replace("#post-", ""), 10);
    if (postsData.find((p) => p.id === postId)) {
      currentPostId = postId;
      loadPostDetail(postId);
      showView("detail");
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

  // Submit new comment
  commentForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const author = document.getElementById("comment-author").value.trim();
    const content = document.getElementById("comment-body-input").value.trim();
    const parentId = document.getElementById("reply-to").value;

    if (author && content && currentPostId) {
      const newComment = createComment(
        currentPostId,
        author,
        content,
        parentId || null,
      );

      // Reload comments
      const comments = commentsData[currentPostId] || [];
      commentsContainer.innerHTML = renderComments(comments);
      updateReplyToOptions(comments);

      // Reset form
      commentForm.reset();

      // Highlight new comment
      setTimeout(() => {
        const newCommentEl = document.querySelector(
          `[data-comment-id="${newComment.id}"]`,
        );
        if (newCommentEl) {
          newCommentEl.classList.add("new-comment");
          newCommentEl.scrollIntoView({ behavior: "smooth", block: "center" });
        }
      }, 100);

      showSuccessMessage(
        document.querySelector(".comment-form-section"),
        "コメントが投稿されました！",
      );
    }
  });
}

// Initialize
export function init() {
  loadPosts();
  setupEventListeners();
}

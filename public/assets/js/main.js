// Sample data - Posts and Comments
let postsData = [
  {
    id: 1,
    author: "tech_enthusiast",
    authorInitial: "T",
    title: "JavaScriptの新機能について語ろう",
    content:
      "ES2024で追加された新機能について皆さんの意見を聞きたいです。特にグループ化メソッドやPromise.withResolversなど、実務で使えそうな機能が多いですね。\n\n皆さんはどの機能に注目していますか？私は特にArray.groupByの正式実装を待ち望んでいました。データ処理がとても簡潔に書けるようになりますね。",
    votes: 156,
    commentCount: 12,
    createdAt: "2024-01-15T10:30:00Z",
  },
  {
    id: 2,
    author: "web_developer",
    authorInitial: "W",
    title: "フロントエンド開発でのパフォーマンス最適化Tips",
    content:
      "最近のプロジェクトでパフォーマンス改善に取り組んでいます。特に効果があったのは、画像の遅延読み込み、コード分割、そしてCSSの最適化でした。\n\nCore Web Vitalsのスコアが大幅に改善されて、LCPが3秒から1.2秒に短縮できました。皆さんのおすすめの最適化手法も教えてください！",
    votes: 234,
    commentCount: 28,
    createdAt: "2024-01-14T15:45:00Z",
  },
  {
    id: 3,
    author: "design_lover",
    authorInitial: "D",
    title: "ダークモードUIデザインのベストプラクティス",
    content:
      "ダークモードの実装で気をつけるべきポイントをまとめました。純粋な黒（#000）は避けて、少しグレーがかった色を使うと目に優しいですね。\n\nまた、コントラスト比はWCAGガイドラインに従って4.5:1以上を確保することが重要です。シャドウの使い方も明るいモードとは異なるアプローチが必要になります。",
    votes: 89,
    commentCount: 7,
    createdAt: "2024-01-13T09:20:00Z",
  },
  {
    id: 4,
    author: "backend_ninja",
    authorInitial: "B",
    title: "REST APIとGraphQL、どちらを選ぶべきか",
    content:
      "新しいプロジェクトでAPIの設計を任されました。REST APIとGraphQLのどちらを採用するか迷っています。\n\nプロジェクトの特性は：\n- 複数のクライアント（Web、iOS、Android）\n- リアルタイム機能が一部必要\n- データの関連性が複雑\n\n経験者の方、アドバイスをいただけると嬉しいです。",
    votes: 312,
    commentCount: 45,
    createdAt: "2024-01-12T18:00:00Z",
  },
  {
    id: 5,
    author: "junior_dev",
    authorInitial: "J",
    title: "プログラミング学習2年目、次に学ぶべきことは？",
    content:
      "JavaScriptとReactを学んで約2年になります。基本的なCRUDアプリは作れるようになりました。\n\n次のステップとして何を学ぶべきか悩んでいます。候補としては：\n1. TypeScript\n2. テスト（Jest、Cypress）\n3. バックエンド（Node.js）\n4. クラウド（AWS）\n\n先輩エンジニアの皆さん、キャリアの観点からアドバイスをください！",
    votes: 178,
    commentCount: 32,
    createdAt: "2024-01-11T12:15:00Z",
  },
];

let commentsData = {
  1: [
    {
      id: 101,
      author: "js_master",
      authorInitial: "J",
      content:
        "Array.groupByは本当に便利ですよね！今までlodashのgroupByを使っていましたが、ネイティブで使えるようになるのは嬉しいです。",
      votes: 45,
      createdAt: "2024-01-15T11:00:00Z",
      parentId: null,
    },
    {
      id: 102,
      author: "typescript_fan",
      authorInitial: "T",
      content:
        "TypeScriptとの相性も良さそうですね。型推論がしっかり効くことを期待しています。",
      votes: 23,
      createdAt: "2024-01-15T11:30:00Z",
      parentId: 101,
    },
    {
      id: 103,
      author: "node_expert",
      authorInitial: "N",
      content:
        "Promise.withResolversはテストコードを書くときに特に便利です。モックやスタブがすっきり書けます。",
      votes: 38,
      createdAt: "2024-01-15T12:00:00Z",
      parentId: null,
    },
    {
      id: 104,
      author: "tech_enthusiast",
      authorInitial: "T",
      content: "確かにテストでの使い道は考えていませんでした。良い視点ですね！",
      votes: 12,
      createdAt: "2024-01-15T12:30:00Z",
      parentId: 103,
    },
  ],
  2: [
    {
      id: 201,
      author: "perf_geek",
      authorInitial: "P",
      content:
        '画像の遅延読み込みにはIntersection Observer APIがおすすめです。loading="lazy"よりも細かい制御ができます。',
      votes: 67,
      createdAt: "2024-01-14T16:00:00Z",
      parentId: null,
    },
    {
      id: 202,
      author: "web_developer",
      authorInitial: "W",
      content:
        "ありがとうございます！Intersection Observerはまだ使ったことがないので、試してみます。",
      votes: 15,
      createdAt: "2024-01-14T16:30:00Z",
      parentId: 201,
    },
    {
      id: 203,
      author: "css_wizard",
      authorInitial: "C",
      content:
        "CSSの最適化では、未使用のCSSを削除するPurgeCSSが効果的でした。バンドルサイズが30%削減されました。",
      votes: 89,
      createdAt: "2024-01-14T17:00:00Z",
      parentId: null,
    },
    {
      id: 204,
      author: "bundle_expert",
      authorInitial: "B",
      content:
        "それに加えてCSS-in-JSからTailwindに移行したら、さらに改善されましたよ。",
      votes: 34,
      createdAt: "2024-01-14T17:30:00Z",
      parentId: 203,
    },
    {
      id: 205,
      author: "newbie_coder",
      authorInitial: "N",
      content: "初心者質問ですが、コード分割ってどうやって始めればいいですか？",
      votes: 8,
      createdAt: "2024-01-14T18:00:00Z",
      parentId: null,
    },
    {
      id: 206,
      author: "web_developer",
      authorInitial: "W",
      content:
        "Reactなら React.lazy() と Suspense を使うのが簡単です。ルートベースの分割から始めるといいですよ。",
      votes: 56,
      createdAt: "2024-01-14T18:30:00Z",
      parentId: 205,
    },
  ],
  3: [
    {
      id: 301,
      author: "ui_designer",
      authorInitial: "U",
      content:
        "私も#121212くらいの暗さをベースにしています。#000は確かにきついですよね。",
      votes: 34,
      createdAt: "2024-01-13T10:00:00Z",
      parentId: null,
    },
    {
      id: 302,
      author: "a11y_advocate",
      authorInitial: "A",
      content:
        "アクセシビリティの観点から補足すると、色だけでなくフォーカスインジケーターもダークモードでは見えにくくなりがちです。要注意！",
      votes: 45,
      createdAt: "2024-01-13T11:00:00Z",
      parentId: null,
    },
  ],
  4: [
    {
      id: 401,
      author: "graphql_lover",
      authorInitial: "G",
      content:
        "その要件だとGraphQLが向いていると思います。特に複数クライアントと複雑なデータ関連性の部分で威力を発揮します。",
      votes: 78,
      createdAt: "2024-01-12T18:30:00Z",
      parentId: null,
    },
    {
      id: 402,
      author: "rest_defender",
      authorInitial: "R",
      content:
        "GraphQLの学習コストとN+1問題への対処を考えると、RESTの方がシンプルに実装できる場合も多いですよ。",
      votes: 56,
      createdAt: "2024-01-12T19:00:00Z",
      parentId: 401,
    },
    {
      id: 403,
      author: "pragmatic_dev",
      authorInitial: "P",
      content:
        "両方使うのもありですよ。メインはRESTで、複雑なクエリが必要な部分だけGraphQLを導入するアプローチもあります。",
      votes: 123,
      createdAt: "2024-01-12T19:30:00Z",
      parentId: null,
    },
    {
      id: 404,
      author: "backend_ninja",
      authorInitial: "B",
      content:
        "なるほど、ハイブリッドアプローチは考えていませんでした。検討してみます！",
      votes: 34,
      createdAt: "2024-01-12T20:00:00Z",
      parentId: 403,
    },
  ],
  5: [
    {
      id: 501,
      author: "senior_engineer",
      authorInitial: "S",
      content:
        "TypeScriptは絶対におすすめです。大規模なコードベースでのバグを事前に防げますし、今やデファクトスタンダードになっています。",
      votes: 145,
      createdAt: "2024-01-11T13:00:00Z",
      parentId: null,
    },
    {
      id: 502,
      author: "test_advocate",
      authorInitial: "T",
      content:
        "TypeScriptと並行してテストも学ぶといいですよ。TDDの考え方を身につけると、コードの質が格段に上がります。",
      votes: 89,
      createdAt: "2024-01-11T13:30:00Z",
      parentId: 501,
    },
    {
      id: 503,
      author: "fullstack_dev",
      authorInitial: "F",
      content:
        "Node.jsを学ぶと、フルスタックで開発できるようになります。キャリアの幅が広がりますよ。",
      votes: 67,
      createdAt: "2024-01-11T14:00:00Z",
      parentId: null,
    },
    {
      id: 504,
      author: "cloud_specialist",
      authorInitial: "C",
      content:
        "AWSは後からでも大丈夫。まずはTypeScriptとテストを固めてから、クラウドに挑戦することをおすすめします。",
      votes: 78,
      createdAt: "2024-01-11T14:30:00Z",
      parentId: null,
    },
    {
      id: 505,
      author: "junior_dev",
      authorInitial: "J",
      content:
        "皆さんありがとうございます！TypeScriptから始めることにします。おすすめの学習リソースがあれば教えてください。",
      votes: 23,
      createdAt: "2024-01-11T15:00:00Z",
      parentId: null,
    },
  ],
};

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

// Load posts
function loadPosts() {
  const html = postsData.map((post) => renderPostCard(post)).join("");
  postsContainer.innerHTML = html;
}

// Load post detail and comments
function loadPostDetail(postId) {
  const post = postsData.find((p) => p.id === postId);

  if (post) {
    postDetailContainer.innerHTML = renderPostDetail(post);

    const comments = commentsData[postId] || [];
    commentsContainer.innerHTML = renderComments(comments);

    // Update reply-to select options
    updateReplyToOptions(comments);
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

  // Submit new post
  postForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const author = document.getElementById("post-author").value.trim();
    const title = document.getElementById("post-title-input").value.trim();
    const content = document.getElementById("post-body").value.trim();

    if (author && title && content) {
      const newPost = createPost(author, title, content);
      loadPosts();
      togglePostForm(false);

      // Highlight new post
      setTimeout(() => {
        const newPostCard = document.querySelector(
          `[data-post-id="${newPost.id}"]`,
        );
        if (newPostCard) {
          newPostCard.classList.add("new-post");
        }
      }, 100);

      showSuccessMessage(
        postListView.querySelector(".create-post-section"),
        "投稿が作成されました！",
      );
    }
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
function init() {
  loadPosts();
  setupEventListeners();
}

// Start the app
document.addEventListener("DOMContentLoaded", init);

document.querySelectorAll('.news-media').forEach((section) => {
  const tabs       = section.querySelectorAll('.news-media__tab');
  const grid       = section.querySelector('.news-media__grid');
  const emptyMsg   = section.querySelector('.news-media__empty');
  const loadMoreBtn = section.querySelector('.news-media__load-more');
  const spinner    = section.querySelector('.news-media__spinner');

  if (!tabs.length || !grid) return;

  let activeTab = 'all';
  let isLoading = false;

  const pages = { blog: 1, news: 1 };
  const hasMore = {
    blog: loadMoreBtn?.dataset.hasMoreBlog === 'true',
    news: loadMoreBtn?.dataset.hasMoreNews === 'true',
  };

  function filterItems(type) {
    let visibleCount = 0;
    grid.querySelectorAll('.news-media__item').forEach((item) => {
      const matches = type === 'all' || item.dataset.type === type;
      item.hidden = !matches;
      if (matches) visibleCount++;
    });
    if (emptyMsg) emptyMsg.hidden = visibleCount > 0;
  }

  function updateLoadMoreBtn(type) {
    if (!loadMoreBtn) return;
    const showable =
      type === 'all'
        ? hasMore.blog || hasMore.news
        : (type === 'blog' || type === 'news') && hasMore[type];
    loadMoreBtn.hidden = !showable;
  }

  function appendItems(items) {
    const perPage = parseInt(loadMoreBtn?.dataset.perPage || 9, 10);
    items.forEach((item, index) => {
      const wrap = document.createElement('div');
      wrap.className = 'news-media__item';
      wrap.dataset.type = item.type;
      wrap.style.opacity = 0;
      if (activeTab !== 'all' && item.type !== activeTab) wrap.hidden = true;
      wrap.innerHTML = item.html;
      grid.appendChild(wrap);
      setTimeout(() => {
        wrap.style.transition = 'opacity 0.4s ease-in-out';
        wrap.style.opacity = 1;
      }, index * 80);
    });
  }

  async function fetchType(type) {
    const perPage = parseInt(loadMoreBtn?.dataset.perPage || 9, 10);
    const res = await fetch(
      `/wp-json/v1/news-media/load_more?type=${type}&page=${pages[type]}&per_page=${perPage}`
    );
    return res.json();
  }

  async function loadMore(type) {
    if (isLoading || !hasMore[type]) return;
    isLoading = true;
    if (spinner) spinner.style.display = 'flex';

    pages[type]++;
    const perPage = parseInt(loadMoreBtn?.dataset.perPage || 9, 10);
    const items = await fetchType(type);

    if (spinner) spinner.style.display = 'none';
    appendItems(items);

    if (items.length < perPage) hasMore[type] = false;
    updateLoadMoreBtn(activeTab);
    isLoading = false;
  }

  async function loadAll() {
    if (isLoading) return;
    isLoading = true;
    if (spinner) spinner.style.display = 'flex';

    const perPage = parseInt(loadMoreBtn?.dataset.perPage || 9, 10);
    const fetches = [];

    if (hasMore.blog) { pages.blog++; fetches.push(fetchType('blog')); }
    else fetches.push(Promise.resolve([]));

    if (hasMore.news) { pages.news++; fetches.push(fetchType('news')); }
    else fetches.push(Promise.resolve([]));

    const [blogItems, newsItems] = await Promise.all(fetches);

    if (spinner) spinner.style.display = 'none';

    // Merge and sort by date DESC before appending
    const merged = [...blogItems, ...newsItems].sort(
      (a, b) => new Date(b.date) - new Date(a.date)
    );
    appendItems(merged);

    if (blogItems.length < perPage) hasMore.blog = false;
    if (newsItems.length < perPage) hasMore.news = false;
    updateLoadMoreBtn('all');
    isLoading = false;
  }

  // Tab switching
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      tabs.forEach((t) => {
        t.classList.remove('is-active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('is-active');
      tab.setAttribute('aria-selected', 'true');
      activeTab = tab.dataset.tab;
      filterItems(activeTab);
      updateLoadMoreBtn(activeTab);
    });
  });

  // Load more
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', () => {
      if (activeTab === 'all') loadAll();
      else if (activeTab === 'blog' || activeTab === 'news') loadMore(activeTab);
    });
  }

  // Set initial button state for the default "all" tab
  updateLoadMoreBtn('all');
});

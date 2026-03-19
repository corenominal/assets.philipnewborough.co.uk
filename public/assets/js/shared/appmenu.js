(function () {
  'use strict';

  const MODAL_ID = 'appMenuModal';
  const STYLES_ID = 'appmenu-styles';

  function injectStyles() {
    if (document.getElementById(STYLES_ID)) return;
    const style = document.createElement('style');
    style.id = STYLES_ID;
    style.textContent = `
      @keyframes appmenu-shimmer {
        0%   { background-position: 200% 0; }
        100% { background-position: -200% 0; }
      }
      .appmenu-icon-wrap {
        width: 56px;
        height: 56px;
        flex-shrink: 0;
        position: relative;
        border-radius: 0.375rem;
      }
      .appmenu-icon-shimmer {
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, #20232C 25%, #272A36 50%, #2a2d30 75%);
        background-size: 200% 100%;
        animation: appmenu-shimmer 1.4s linear infinite;
      }
      .appmenu-icon {
        width: 56px;
        height: 56px;
        object-fit: contain;
        display: block;
        position: relative;
        z-index: 1;
        transition: transform 0.2s ease, opacity 0.15s ease;
      }
      .appmenu-card { transition: box-shadow 0.2s ease; }
      .appmenu-card:hover { box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12) !important; }
      .appmenu-card:hover .appmenu-icon { transform: scale(1.12); }
      .appmenu-pin-badge { z-index: 2; }
    `;
    document.head.appendChild(style);
  }

  function createModal(manageUrl) {
    const modal = document.createElement('div');
    modal.id = MODAL_ID;
    modal.className = 'modal fade';
    modal.tabIndex = -1;
    modal.setAttribute('aria-labelledby', `${MODAL_ID}Label`);
    modal.setAttribute('aria-hidden', 'true');

    modal.innerHTML = `
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="${MODAL_ID}Label">App Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <input
                type="search"
                id="${MODAL_ID}Search"
                class="form-control"
                placeholder="Search..."
                aria-label="Search app menu"
                autocomplete="off"
              >
            </div>
            <div id="${MODAL_ID}Spinner" class="text-center py-3 d-none" aria-live="polite">
              <div class="spinner-border spinner-border-sm text-secondary" role="status">
                <span class="visually-hidden">Loading…</span>
              </div>
            </div>
            <div id="${MODAL_ID}Alert" class="alert d-none" role="alert"></div>
            <div id="${MODAL_ID}List" role="list" aria-live="polite"></div>
            <p id="${MODAL_ID}Empty" class="text-muted text-center small mt-2 d-none">No results found.</p>
          </div>
          ${manageUrl ? `
          <div class="modal-footer">
            <a href="${manageUrl}" class="btn btn-primary">Manage App Menu</a>
          </div>` : ''}
        </div>
      </div>
    `;

    return modal;
  }

  function showSpinner(visible) {
    const el = document.getElementById(`${MODAL_ID}Spinner`);
    if (el) el.classList.toggle('d-none', !visible);
  }

  function showAlert(message, type = 'danger') {
    const el = document.getElementById(`${MODAL_ID}Alert`);
    if (!el) return;
    el.className = `alert alert-${type} mb-2`;
    el.textContent = message;
    el.classList.remove('d-none');
  }

  function filterItems(query) {
    const container = document.getElementById(`${MODAL_ID}List`);
    const emptyMsg = document.getElementById(`${MODAL_ID}Empty`);
    if (!container) return;

    const q = query.trim().toLowerCase();
    let visibleCount = 0;

    container.querySelectorAll('.appmenu-card').forEach(card => {
      const searchText = card.dataset.search || card.textContent.toLowerCase();
      const matches = !q || searchText.includes(q);
      card.classList.toggle('d-none', !matches);
      if (matches) visibleCount++;
    });

    if (emptyMsg) {
      const total = container.querySelectorAll('.appmenu-card').length;
      emptyMsg.classList.toggle('d-none', visibleCount > 0 || total === 0);
    }
  }

  function buildCard(item, iconBaseUrl) {
    const isPinned = !!item.pinned;
    const name = item.name || item.label || item.title || '';
    const description = item.description || '';
    const url = item.url || '';
    const iconFilename = item.icon || '';
    const iconUrl = (iconBaseUrl && iconFilename)
      ? `${iconBaseUrl.replace(/\/+$/, '')}/${iconFilename}`
      : '';

    const card = document.createElement('div');
    card.className = `card mb-3 appmenu-card${isPinned ? ' border-primary' : ''}`;
    card.setAttribute('role', 'listitem');
    card.dataset.search = `${name} ${description}`.toLowerCase();

    if (isPinned) {
      const badge = document.createElement('span');
      badge.className = 'badge text-bg-primary position-absolute top-0 end-0 m-1 appmenu-pin-badge';
      badge.title = 'Pinned';
      badge.setAttribute('aria-label', 'Pinned');
      badge.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z"/></svg>';
      card.appendChild(badge);
    }

    const link = document.createElement('a');
    link.href = url;
    link.className = 'card-body d-flex align-items-center gap-3 p-2 text-decoration-none text-body stretched-link';
    link.setAttribute('aria-label', name);
    if (item.target) link.target = item.target;

    const iconWrap = document.createElement('div');
    iconWrap.className = 'appmenu-icon-wrap flex-shrink-0';

    const shimmer = document.createElement('div');
    shimmer.className = 'appmenu-icon-shimmer';
    iconWrap.appendChild(shimmer);

    if (iconUrl) {
      const img = document.createElement('img');
      img.alt = name;
      img.loading = 'lazy';
      img.className = 'appmenu-icon';
      img.style.opacity = '0';
      img.addEventListener('load', () => {
        shimmer.style.display = 'none';
        img.style.opacity = '1';
      });
      img.addEventListener('error', () => {
        shimmer.style.display = 'none';
      });
      img.src = iconUrl;
      iconWrap.appendChild(img);
    }

    link.appendChild(iconWrap);

    const textDiv = document.createElement('div');
    textDiv.className = 'flex-grow-1 overflow-hidden';

    const titleRow = document.createElement('div');
    titleRow.className = 'd-flex align-items-center gap-2';

    const titleEl = document.createElement('div');
    titleEl.className = 'fw-semibold text-truncate';
    titleEl.textContent = name;
    titleRow.appendChild(titleEl);

    if (item.group === 'administrators') {
      const adminBadge = document.createElement('span');
      adminBadge.className = 'badge text-bg-secondary flex-shrink-0';
      adminBadge.textContent = 'Admin';
      adminBadge.title = 'Administrators only';
      titleRow.appendChild(adminBadge);
    }

    textDiv.appendChild(titleRow);

    if (description) {
      const descEl = document.createElement('div');
      descEl.className = 'small text-muted text-truncate';
      descEl.textContent = description;
      textDiv.appendChild(descEl);
    }

    if (url) {
      let displayUrl;
      try {
        displayUrl = new URL(url).hostname;
      } catch (_) {
        displayUrl = url;
      }
      const urlEl = document.createElement('div');
      urlEl.className = 'small text-primary text-truncate';
      urlEl.textContent = displayUrl;
      textDiv.appendChild(urlEl);
    }

    link.appendChild(textDiv);
    card.appendChild(link);

    return card;
  }

  function populateList(items, iconBaseUrl) {
    const container = document.getElementById(`${MODAL_ID}List`);
    if (!container) return;

    container.innerHTML = '';

    if (!items || items.length === 0) {
      showAlert('No items available.', 'info');
      return;
    }

    const sorted = [...items].sort((a, b) => {
      if (!!a.pinned === !!b.pinned) return (a.name || '').localeCompare(b.name || '');
      return a.pinned ? -1 : 1;
    });

    const fragment = document.createDocumentFragment();
    sorted.forEach(item => fragment.appendChild(buildCard(item, iconBaseUrl)));
    container.appendChild(fragment);

    // Re-apply any active search filter
    const searchInput = document.getElementById(`${MODAL_ID}Search`);
    if (searchInput && searchInput.value) {
      filterItems(searchInput.value);
    }
  }

  function getCookie(name) {
    const match = document.cookie.split('; ').find(row => row.startsWith(name + '='));
    return match ? decodeURIComponent(match.split('=')[1]) : null;
  }

  function fetchMenuItems(apiUrl) {
    showSpinner(true);

    let iconBaseUrl = '';
    try {
      iconBaseUrl = new URL(apiUrl).origin + '/icons';
    } catch (_) {}

    const headers = { 'Accept': 'application/json' };
    const userUuid = getCookie('user_uuid');
    const apiKey = getCookie('apikey');
    if (userUuid) headers['user-uuid'] = userUuid;
    if (apiKey) headers['apikey'] = apiKey;

    fetch(apiUrl, {
      method: 'GET',
      headers,
      credentials: 'same-origin',
    })
      .then(response => {
        if (!response.ok) {
          throw new Error(`${response.status} ${response.statusText}`);
        }
        return response.json();
      })
      .then(data => {
        showSpinner(false);
        // Support { items: [] }, { data: [] }, or a plain array
        const items = Array.isArray(data) ? data : (data.items ?? data.data ?? []);
        populateList(items, iconBaseUrl);
      })
      .catch(err => {
        showSpinner(false);
        showAlert('Failed to load menu items. Please try again.');
        console.error('[AppMenu]', err);
      });
  }

  function openAppMenu(trigger) {
    injectStyles();

    // Remove any existing instance first
    document.getElementById(MODAL_ID)?.remove();

    // Resolve API endpoint: data-appmenu-url on the trigger element
    const apiUrl = trigger.dataset.appmenuUrl;
    const apiUrlBase = trigger.dataset.apiUrl;
    let resolvedApiUrl = apiUrl || '';
    if (!resolvedApiUrl && apiUrlBase) {
      resolvedApiUrl = `${apiUrlBase.replace(/\/+$/, '')}/api/items`;
    }
    const manageUrl = apiUrlBase ? apiUrlBase.replace(/\/+$/, '') : '';

    const modalEl = createModal(manageUrl);
    document.body.appendChild(modalEl);

    const bsModal = new bootstrap.Modal(modalEl);

    // Wire up search/filter input
    const searchInput = document.getElementById(`${MODAL_ID}Search`);
    if (searchInput) {
      searchInput.addEventListener('input', e => filterItems(e.target.value));
      searchInput.addEventListener('keydown', e => {
        if (e.key !== 'Enter') return;
        const container = document.getElementById(`${MODAL_ID}List`);
        if (!container) return;
        const visible = [...container.querySelectorAll('.appmenu-card')].filter(c => !c.classList.contains('d-none'));
        if (visible.length === 1) {
          const link = visible[0].querySelector('a[href]');
          if (link) link.click();
        }
      });
    }

    // Focus search input once the modal has opened
    modalEl.addEventListener('shown.bs.modal', () => {
      searchInput?.focus();
    });

    // Blur any focused element inside the modal before Bootstrap sets aria-hidden
    modalEl.addEventListener('hide.bs.modal', () => {
      if (modalEl.contains(document.activeElement)) {
        document.activeElement.blur();
      }
    });

    // Clean up the DOM after the modal closes
    modalEl.addEventListener('hidden.bs.modal', () => {
      bsModal.dispose();
      modalEl.remove();
    });

    bsModal.show();

    if (resolvedApiUrl) {
      fetchMenuItems(resolvedApiUrl);
    }
  }

  // Event delegation — works for triggers added dynamically to the page
  document.addEventListener('click', function (e) {
    const trigger = e.target.closest('.trigger-appmenu');
    if (!trigger) return;
    e.preventDefault();
    openAppMenu(trigger);
  });

}());

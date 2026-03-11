(function () {
  'use strict';

  const MODAL_ID = 'shared-notifications-modal';
  const POLL_INTERVAL_MS = 5 * 60 * 1000; // 5 minutes

  // ── Utilities ────────────────────────────────────────────────────────────────

  function getCookie(name) {
    const match = document.cookie.match(
      new RegExp('(?:^|;)\\s*' + name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + '\\s*=\\s*([^;]*)')
    );
    return match ? decodeURIComponent(match[1]) : null;
  }

  function apiHeaders(trigger) {
    const headers = {
      'Accept': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
    };
    const apiKey   = (trigger && trigger.dataset.apikey)   || getCookie('apikey');
    const userUuid = (trigger && trigger.dataset.userUuid) || getCookie('user_uuid');
    if (apiKey)   headers['apikey']    = apiKey;
    if (userUuid) headers['user-uuid'] = userUuid;
    return headers;
  }

  function escapeHtml(str) {
    if (str == null) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }

  function sanitizeUrl(url) {
    if (!url) return '';
    try {
      const parsed = new URL(url, window.location.origin);
      return ['http:', 'https:'].includes(parsed.protocol) ? parsed.href : '';
    } catch {
      return '';
    }
  }

  function formatRelativeTime(isoString) {
    if (!isoString) return '';
    const date = new Date(isoString);
    if (isNaN(date)) return '';
    const diffMs   = Date.now() - date.getTime();
    const diffSecs = Math.floor(diffMs / 1000);
    const diffMins = Math.floor(diffSecs / 60);
    const diffHours = Math.floor(diffMins / 60);
    const diffDays  = Math.floor(diffHours / 24);

    if (diffSecs < 60)  return 'just now';
    if (diffMins < 60)  return `${diffMins} minute${diffMins !== 1 ? 's' : ''} ago`;
    if (diffHours < 24) return `${diffHours} hour${diffHours !== 1 ? 's' : ''} ago`;
    if (diffDays < 7)   return `${diffDays} day${diffDays !== 1 ? 's' : ''} ago`;
    return date.toLocaleDateString(undefined, { day: 'numeric', month: 'short', year: 'numeric' });
  }

  // ── Trigger badge ─────────────────────────────────────────────────────────────

  function updateTriggerBadges(count) {
    document.querySelectorAll('.trigger-notifications').forEach(function (trigger) {
      let badge = trigger.querySelector('.trigger-notifications-badge');
      if (count > 0) {
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'trigger-notifications-badge badge text-bg-primary rounded-pill';
          badge.setAttribute('aria-label', 'Unread notifications');
          const pos = getComputedStyle(trigger).position;
          if (pos === 'static') trigger.style.position = 'relative';
          trigger.appendChild(badge);
        }
        badge.textContent = count > 99 ? '99+' : count;
      } else {
        if (badge) {
          badge.classList.add('is-hiding');
          badge.addEventListener('animationend', function () { badge.remove(); }, { once: true });
        }
      }
    });
  }

  function fetchUnreadCount(trigger) {
    const apiUrl = trigger.dataset.apiUrl;
    const userUuid = (trigger.dataset.userUuid) || getCookie('user_uuid');
    if (!apiUrl || !userUuid) return;
    const base = apiUrl.replace(/\/$/, '');
    const endpoint = `${base}/api/notifications/${encodeURIComponent(userUuid)}`;
    fetch(endpoint, {
      method: 'GET',
      headers: apiHeaders(trigger),
      credentials: 'same-origin',
    })
      .then(function (response) {
        if (!response.ok) throw new Error(`${response.status}`);
        return response.json();
      })
      .then(function (data) {
        const count = typeof data.unread === 'number' ? data.unread : 0;
        updateTriggerBadges(count);
      })
      .catch(function (err) {
        console.error('[Notifications] Badge fetch failed:', err);
      });
  }

  function injectStyles() {
    if (document.getElementById(`${MODAL_ID}-styles`)) return;
    const style = document.createElement('style');
    style.id = `${MODAL_ID}-styles`;
    style.textContent = `
      @keyframes notif-badge-in {
        0%   { transform: scale(0); opacity: 0; }
        70%  { transform: scale(1.25); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
      }
      @keyframes notif-badge-out {
        0%   { transform: scale(1); opacity: 1; }
        100% { transform: scale(0); opacity: 0; }
      }
      .trigger-notifications-badge {
        animation: notif-badge-in 0.25s ease forwards;
      }
      .trigger-notifications-badge.is-hiding {
        animation: notif-badge-out 0.2s ease forwards;
      }
      @media (min-width: 992px) {
        .trigger-notifications-badge {
          position: absolute;
          display: block;
          right: -6px;
          top: 10px;
        }
      }
      #${MODAL_ID} .notification-item-unread {
      }
      #${MODAL_ID} .notification-item-read {
        border-inline-start: 3px solid transparent;
      }
      #${MODAL_ID} .notification-icon {
        flex-shrink: 0;
        transition: transform 0.25s ease;
      }
      #${MODAL_ID} li:hover .notification-icon {
        transform: scale(1.15);
      }
      #${MODAL_ID} .notification-icon-placeholder {
        width: 40px;
        height: 40px;
      }
      #${MODAL_ID} .notification-clear-btn {
        position: absolute;
        top: 0.45rem;
        right: 0.8rem;
        z-index: 2;
        font-size: 0.65em;
      }
    `;
    document.head.appendChild(style);
  }

  // ── Notification item builder ─────────────────────────────────────────────────

  function buildNotificationItem(notification) {
    const isUnread = parseInt(notification.read, 10) !== 1;
    const relTime  = formatRelativeTime(notification.created_at);
    const safeIcon = sanitizeUrl(notification.icon);
    const safeUrl  = sanitizeUrl(notification.url);

    const iconHtml = safeIcon
      ? `<img src="${escapeHtml(safeIcon)}" alt="" class="notification-icon rounded" width="40" height="40" loading="lazy">`
      : `<div class="notification-icon notification-icon-placeholder rounded d-flex align-items-center justify-content-center bg-secondary-subtle text-secondary" aria-hidden="true">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
             <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.37 1.566-.659 2.258h10.236c-.29-.692-.5-1.49-.66-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
           </svg>
         </div>`;

    const ctaHtml = safeUrl
      ? `<a href="${escapeHtml(safeUrl)}"
            class="btn btn-sm btn-outline-primary mt-2 position-relative"
            ${!safeUrl.startsWith(window.location.origin) ? 'target="_blank" rel="noopener noreferrer"' : ''}>
           ${escapeHtml(notification.calltoaction || 'View')}
         </a>`
      : '';

    return `
      <li class="list-group-item list-group-item-action px-3 py-3 position-relative ${isUnread ? 'notification-item-unread' : 'notification-item-read'}"
          data-notification-id="${escapeHtml(String(notification.id))}">
        <button type="button" class="btn-close notification-clear-btn" aria-label="Dismiss"></button>
        <div class="d-flex gap-3 align-items-start">
          ${iconHtml}
          <div class="flex-grow-1 overflow-hidden">
            <div class="mb-1">
              <span class="${isUnread ? 'fw-semibold text-white' : 'text-body-secondary'}">
                ${safeUrl
                  ? `<a href="${escapeHtml(safeUrl)}" class="stretched-link text-reset me-2 text-decoration-none"${!safeUrl.startsWith(window.location.origin) ? ' target="_blank" rel="noopener noreferrer"' : ''}>${escapeHtml(notification.title || '(No title)')}</a>`
                  : escapeHtml(notification.title || '(No title)')}
              </span>
              ${relTime ? `<br><small class="text-muted text-nowrap">${escapeHtml(relTime)}</small>` : ''}
            </div>
            ${notification.body ? `<p class="mb-0 small ${isUnread ? 'text-white' : 'text-body-secondary'}">${escapeHtml(notification.body)}</p>` : ''}
            ${ctaHtml}
          </div>
        </div>
      </li>`;
  }

  // ── Modal creation ────────────────────────────────────────────────────────────

  function createModal() {
    const existing = document.getElementById(MODAL_ID);
    if (existing) return existing;

    injectStyles();

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
      <div class="modal fade" id="${MODAL_ID}" tabindex="-1"
           aria-labelledby="${MODAL_ID}-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">

            <div class="modal-header">
              <div class="d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                     viewBox="0 0 16 16" aria-hidden="true">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.37 1.566-.659 2.258h10.236c-.29-.692-.5-1.49-.66-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
                <h5 class="modal-title mb-0" id="${MODAL_ID}-title">Notifications</h5>
                <span id="${MODAL_ID}-badge" class="badge text-bg-primary d-none" aria-label="Unread notifications"></span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
              <div id="${MODAL_ID}-loading" class="text-center py-4" aria-live="polite">
                <div class="spinner-border spinner-border-sm text-secondary mb-2" role="status">
                  <span class="visually-hidden">Loading…</span>
                </div>
                <div class="small text-body-secondary mt-1">Fetching notifications…</div>
              </div>

              <div id="${MODAL_ID}-error" class="d-none px-3 py-3">
                <div class="alert alert-danger mb-0" role="alert">
                  Failed to load notifications. Please try again.
                </div>
              </div>

              <div id="${MODAL_ID}-empty" class="d-none text-center py-5 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                     class="text-body-secondary mb-3 d-block mx-auto opacity-50" viewBox="0 0 16 16" aria-hidden="true">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.37 1.566-.659 2.258h10.236c-.29-.692-.5-1.49-.66-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
                <p class="text-body-secondary mb-0">You're all caught up — no notifications.</p>
              </div>

              <ul id="${MODAL_ID}-list" class="list-group list-group-flush d-none"
                  role="list" aria-live="polite" aria-label="Notifications"></ul>
            </div>

            <div class="modal-footer d-none" id="${MODAL_ID}-footer">
              <button type="button" class="btn btn-sm btn-outline-primary d-none"
                      id="${MODAL_ID}-mark-read">
                Mark all as read
              </button>
              <button type="button" class="btn btn-sm btn-outline-primary d-none"
                      id="${MODAL_ID}-clear-all">
                Clear all
              </button>
            </div>

          </div>
        </div>
      </div>`;

    const modalElem = wrapper.firstElementChild;
    document.body.appendChild(modalElem);

    modalElem.addEventListener('hide.bs.modal', function () {
      if (modalElem.contains(document.activeElement)) {
        document.activeElement.blur();
      }
    });

    modalElem.addEventListener('hidden.bs.modal', function () {
      showLoading();
    });

    return modalElem;
  }

  // ── Body state helpers ────────────────────────────────────────────────────────

  function showLoading() {
    document.getElementById(`${MODAL_ID}-loading`).classList.remove('d-none');
    document.getElementById(`${MODAL_ID}-error`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-empty`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-list`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-footer`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-mark-read`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-clear-all`).classList.add('d-none');
    const badge = document.getElementById(`${MODAL_ID}-badge`);
    badge.classList.add('d-none');
    badge.textContent = '';
  }

  function showError() {
    document.getElementById(`${MODAL_ID}-loading`).classList.add('d-none');
    document.getElementById(`${MODAL_ID}-error`).classList.remove('d-none');
  }

  function renderNotifications(data, markReadUrl, trigger, readUrl, clearUrl, clearAllUrl) {
    document.getElementById(`${MODAL_ID}-loading`).classList.add('d-none');

    const notifications = Array.isArray(data.notifications) ? data.notifications : [];
    const unreadCount   = typeof data.unread === 'number' ? data.unread : 0;

    if (notifications.length === 0) {
      document.getElementById(`${MODAL_ID}-empty`).classList.remove('d-none');
      return;
    }

    if (unreadCount > 0) {
      const badge = document.getElementById(`${MODAL_ID}-badge`);
      badge.textContent = unreadCount;
      badge.classList.remove('d-none');
    }
    if (unreadCount > 0 && markReadUrl) {
      document.getElementById(`${MODAL_ID}-mark-read`).classList.remove('d-none');
    }
    if (clearAllUrl) {
      document.getElementById(`${MODAL_ID}-clear-all`).classList.remove('d-none');
    }
    if ((unreadCount > 0 && markReadUrl) || clearAllUrl) {
      document.getElementById(`${MODAL_ID}-footer`).classList.remove('d-none');
    }

    // Unread items first, then most-recent first within each group
    const sorted = [...notifications].sort((a, b) => {
      const aUnread = parseInt(a.read, 10) === 1 ? 1 : 0;
      const bUnread = parseInt(b.read, 10) === 1 ? 1 : 0;
      if (aUnread !== bUnread) return aUnread - bUnread;
      return new Date(b.created_at || 0) - new Date(a.created_at || 0);
    });

    const listEl = document.getElementById(`${MODAL_ID}-list`);
    listEl.innerHTML = sorted.map(buildNotificationItem).join('');
    listEl.classList.remove('d-none');

    listEl.onclick = function (e) {
      // Handle per-item dismiss button
      const clearBtn = e.target.closest('.notification-clear-btn');
      if (clearBtn) {
        const li = clearBtn.closest('li[data-notification-id]');
        if (!li || !clearUrl) return;
        clearBtn.disabled = true;
        const wasUnread = li.classList.contains('notification-item-unread');

        fetch(clearUrl, {
          method: 'POST',
          headers: Object.assign({}, apiHeaders(trigger), { 'Content-Type': 'application/json' }),
          credentials: 'same-origin',
          body: JSON.stringify({ id: li.dataset.notificationId }),
        })
          .then(function (response) {
            if (!response.ok) throw new Error(response.status);
            li.remove();
            const remaining = listEl.querySelectorAll('li[data-notification-id]').length;
            if (remaining === 0) {
              listEl.classList.add('d-none');
              document.getElementById(`${MODAL_ID}-footer`).classList.add('d-none');
              document.getElementById(`${MODAL_ID}-empty`).classList.remove('d-none');
            }
            if (wasUnread) {
              const badge = document.getElementById(`${MODAL_ID}-badge`);
              const next = (parseInt(badge.textContent, 10) || 0) - 1;
              if (next <= 0) {
                badge.classList.add('d-none');
                badge.textContent = '';
                document.getElementById(`${MODAL_ID}-mark-read`).classList.add('d-none');
                if (!clearAllUrl || remaining === 0) {
                  document.getElementById(`${MODAL_ID}-footer`).classList.add('d-none');
                }
              } else {
                badge.textContent = next;
              }
              updateTriggerBadges(Math.max(0, next));
            }
          })
          .catch(function () { clearBtn.disabled = false; });
        return;
      }

      // Handle notification link clicks
      const link = e.target.closest('a[href]');
      if (!link) return;
      const li = link.closest('li[data-notification-id]');
      if (!li) return;
      e.preventDefault();

      const notificationId = li.dataset.notificationId;
      const href           = link.href;
      const isExternal     = link.target === '_blank';

      function navigate() {
        if (isExternal) {
          window.open(href, '_blank', 'noopener,noreferrer');
        } else {
          window.location.href = href;
        }
      }

      fetch(readUrl, {
        method: 'POST',
        headers: Object.assign({}, apiHeaders(trigger), { 'Content-Type': 'application/json' }),
        credentials: 'same-origin',
        body: JSON.stringify({ id: notificationId }),
      })
        .then(function (response) {
          if (response.ok && li.classList.contains('notification-item-unread')) {
            li.classList.replace('notification-item-unread', 'notification-item-read');
            li.querySelectorAll('.fw-semibold').forEach(function (el) {
              el.classList.remove('fw-semibold', 'text-white');
              el.classList.add('text-body-secondary');
            });
            li.querySelectorAll('.text-white').forEach(function (el) {
              el.classList.remove('text-white');
              el.classList.add('text-body-secondary');
            });
          }
        })
        .catch(function () {})
        .finally(navigate);
    };
  }

  // ── API calls ─────────────────────────────────────────────────────────────────

  function fetchNotifications(endpoint, trigger, markReadUrl, readUrl, clearUrl, clearAllUrl) {
    showLoading();

    fetch(endpoint, {
      method: 'GET',
      headers: apiHeaders(trigger),
      credentials: 'same-origin',
    })
      .then(response => {
        if (!response.ok) throw new Error(`${response.status} ${response.statusText}`);
        return response.json();
      })
      .then(data => renderNotifications(data, markReadUrl, trigger, readUrl, clearUrl, clearAllUrl))
      .catch(err => {
        showError();
        console.error('[Notifications]', err);
      });
  }

  function setupMarkAllRead(markReadUrl, trigger, userUuid) {
    const footerEl = document.getElementById(`${MODAL_ID}-footer`);
    if (!footerEl || !markReadUrl) return;

    // Replace button to clear any previously attached handlers
    const oldBtn = document.getElementById(`${MODAL_ID}-mark-read`);
    if (!oldBtn) return;
    const btn = oldBtn.cloneNode(true);
    btn.disabled = false;
    btn.textContent = 'Mark all as read';
    oldBtn.replaceWith(btn);

    btn.addEventListener('click', function () {
      btn.disabled = true;
      btn.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Marking…`;

      fetch(markReadUrl, {
        method: 'POST',
        headers: apiHeaders(trigger),
        credentials: 'same-origin',
      })
        .then(response => {
          if (!response.ok) throw new Error(`${response.status}`);

          // Remove unread styling and "New" badges from all items
          const listEl = document.getElementById(`${MODAL_ID}-list`);
          if (listEl) {
            listEl.querySelectorAll('.notification-item-unread').forEach(el => {
              el.classList.replace('notification-item-unread', 'notification-item-read');
              el.querySelectorAll('.fw-semibold').forEach(title => {
                title.classList.remove('fw-semibold', 'text-white');
                title.classList.add('text-body-secondary');
              });
              el.querySelectorAll('.text-white').forEach(node => {
                node.classList.remove('text-white');
                node.classList.add('text-body-secondary');
              });
            });
          }

          const badge = document.getElementById(`${MODAL_ID}-badge`);
          if (badge) badge.classList.add('d-none');
          footerEl.classList.add('d-none');
          updateTriggerBadges(0);
        })
        .catch(err => {
          btn.disabled = false;
          btn.textContent = 'Mark all as read';
          console.error('[Notifications] Mark-read failed:', err);
        });
    });
  }

  function setupClearAll(clearAllUrl, trigger) {
    const footerEl = document.getElementById(`${MODAL_ID}-footer`);
    if (!footerEl || !clearAllUrl) return;

    const oldBtn = document.getElementById(`${MODAL_ID}-clear-all`);
    if (!oldBtn) return;
    const btn = oldBtn.cloneNode(true);
    btn.disabled = false;
    btn.textContent = 'Clear all';
    oldBtn.replaceWith(btn);

    btn.addEventListener('click', function () {
      btn.disabled = true;
      btn.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Clearing…`;

      fetch(clearAllUrl, {
        method: 'POST',
        headers: apiHeaders(trigger),
        credentials: 'same-origin',
      })
        .then(response => {
          if (!response.ok) throw new Error(`${response.status}`);

          const listEl = document.getElementById(`${MODAL_ID}-list`);
          if (listEl) {
            listEl.innerHTML = '';
            listEl.classList.add('d-none');
          }
          document.getElementById(`${MODAL_ID}-empty`).classList.remove('d-none');
          const badge = document.getElementById(`${MODAL_ID}-badge`);
          if (badge) badge.classList.add('d-none');
          footerEl.classList.add('d-none');
          updateTriggerBadges(0);
        })
        .catch(err => {
          btn.disabled = false;
          btn.textContent = 'Clear all';
          console.error('[Notifications] Clear-all failed:', err);
        });
    });
  }

  // ── Open modal ────────────────────────────────────────────────────────────────

  function openNotifications(trigger) {
    const apiUrl = trigger.dataset.apiUrl;
    if (!apiUrl) {
      console.warn('[Notifications] Trigger is missing data-api-url.');
      return;
    }

    const userUuid = (trigger.dataset.userUuid) || getCookie('user_uuid');
    if (!userUuid) {
      console.warn('[Notifications] Cannot determine user UUID.');
      return;
    }

    if (!window.bootstrap || typeof window.bootstrap.Modal !== 'function') {
      console.error('[Notifications] Bootstrap 5 is not available.');
      return;
    }

    const base        = apiUrl.replace(/\/$/, '');
    const endpoint    = `${base}/api/notifications/${encodeURIComponent(userUuid)}`;
    const markReadUrl = `${base}/api/notification/readall`;
    const readUrl     = `${base}/api/notification/read`;
    const clearUrl    = `${base}/api/notification/clear`;
    const clearAllUrl = `${base}/api/notification/clearall`;
    const modalElem   = createModal();
    const bsModal     = bootstrap.Modal.getOrCreateInstance(modalElem);

    function onShown() {
      modalElem.removeEventListener('shown.bs.modal', onShown);
      fetchNotifications(endpoint, trigger, markReadUrl, readUrl, clearUrl, clearAllUrl);
      if (markReadUrl) setupMarkAllRead(markReadUrl, trigger, userUuid);
      setupClearAll(clearAllUrl, trigger);
    }

    function onHidden() {
      modalElem.removeEventListener('hidden.bs.modal', onHidden);
      if (trigger && typeof trigger.focus === 'function') trigger.focus();
    }

    modalElem.addEventListener('shown.bs.modal', onShown);
    modalElem.addEventListener('hidden.bs.modal', onHidden);

    if (document.activeElement && typeof document.activeElement.blur === 'function') {
      document.activeElement.blur();
    }

    bsModal.show();
  }

  // ── Event delegation ──────────────────────────────────────────────────────────

  document.addEventListener('click', function (e) {
    const trigger = e.target.closest('.trigger-notifications');
    if (!trigger) return;
    e.preventDefault();
    openNotifications(trigger);
  });

  // ── Initialise badge on page load and start polling ───────────────────────────

  function initBadgePolling() {
    const triggers = document.querySelectorAll('.trigger-notifications[data-api-url]');
    if (!triggers.length) return;
    injectStyles();
    const primary = triggers[0];
    setTimeout(function () { fetchUnreadCount(primary); }, 2000);
    setInterval(function () { fetchUnreadCount(primary); }, POLL_INTERVAL_MS);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBadgePolling);
  } else {
    initBadgePolling();
  }

})();

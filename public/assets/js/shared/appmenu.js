(function () {
  'use strict';

  const MODAL_ID = 'appMenuModal';

  function createModal() {
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
            <ul id="${MODAL_ID}List" class="list-group list-group-flush" role="list" aria-live="polite"></ul>
            <p id="${MODAL_ID}Empty" class="text-muted text-center small mt-2 d-none">No results found.</p>
          </div>
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
    const list = document.getElementById(`${MODAL_ID}List`);
    const emptyMsg = document.getElementById(`${MODAL_ID}Empty`);
    if (!list) return;

    const q = query.trim().toLowerCase();
    let visibleCount = 0;

    list.querySelectorAll('.list-group-item').forEach(item => {
      const matches = !q || item.textContent.toLowerCase().includes(q);
      item.classList.toggle('d-none', !matches);
      if (matches) visibleCount++;
    });

    if (emptyMsg) {
      emptyMsg.classList.toggle('d-none', visibleCount > 0 || list.children.length === 0);
    }
  }

  function populateList(items) {
    const list = document.getElementById(`${MODAL_ID}List`);
    if (!list) return;

    list.innerHTML = '';

    if (!items || items.length === 0) {
      showAlert('No items available.', 'info');
      return;
    }

    const fragment = document.createDocumentFragment();

    items.forEach(item => {
      const li = document.createElement('li');
      li.className = 'list-group-item list-group-item-action p-0';

      if (item.url) {
        const a = document.createElement('a');
        a.href = item.url;
        a.className = 'd-block px-3 py-2 text-decoration-none text-body stretched-link';
        a.textContent = item.label || item.name || item.title || '';
        if (item.target) a.target = item.target;
        if (item.description) {
          const small = document.createElement('small');
          small.className = 'd-block text-muted';
          small.textContent = item.description;
          a.appendChild(small);
        }
        li.appendChild(a);
      } else {
        li.classList.remove('list-group-item-action');
        li.classList.add('px-3', 'py-2');
        li.textContent = item.label || item.name || item.title || '';
      }

      fragment.appendChild(li);
    });

    list.appendChild(fragment);

    // Re-apply any active search filter
    const searchInput = document.getElementById(`${MODAL_ID}Search`);
    if (searchInput && searchInput.value) {
      filterItems(searchInput.value);
    }
  }

  function fetchMenuItems(apiUrl) {
    showSpinner(true);

    fetch(apiUrl, {
      method: 'GET',
      headers: { 'Accept': 'application/json' },
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
        populateList(items);
      })
      .catch(err => {
        showSpinner(false);
        showAlert('Failed to load menu items. Please try again.');
        console.error('[AppMenu]', err);
      });
  }

  function openAppMenu(trigger) {
    // Remove any existing instance first
    document.getElementById(MODAL_ID)?.remove();

    const modalEl = createModal();
    document.body.appendChild(modalEl);

    const bsModal = new bootstrap.Modal(modalEl);

    // Wire up search/filter input
    const searchInput = document.getElementById(`${MODAL_ID}Search`);
    if (searchInput) {
      searchInput.addEventListener('input', e => filterItems(e.target.value));
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

    // Resolve API endpoint: data-appmenu-url on the trigger element
    const apiUrl = trigger.dataset.appmenuUrl;
    if (apiUrl) {
      fetchMenuItems(apiUrl);
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

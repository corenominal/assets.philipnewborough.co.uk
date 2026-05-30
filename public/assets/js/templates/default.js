// ── Theme toggle ───────────────────────────────────────
(function () {
    const root = document.documentElement;
    const mq = window.matchMedia("(prefers-color-scheme: dark)");

    function applyTheme(v) {
    root.setAttribute("data-bs-theme", v === "auto" ? (mq.matches ? "dark" : "light") : v);
    }

    applyTheme(localStorage.getItem("bs-theme") || "dark");

    document.querySelectorAll("[data-theme]").forEach(btn => {
    btn.addEventListener("click", () => {
        const v = btn.getAttribute("data-theme");
        localStorage.setItem("bs-theme", v);
        applyTheme(v);
    });
    });

    mq.addEventListener("change", () => {
    if (localStorage.getItem("bs-theme") === "auto") applyTheme("auto");
    });
})();

// ── Sidebar toggle (desktop) ───────────────────────────
const sidebar   = document.getElementById("sidebar");
const toggleBtn = document.getElementById("sidebarToggle");

let tooltipInstances = [];

function initTooltips() {
    tooltipInstances.forEach(t => t.dispose());
    tooltipInstances = [];
    if (sidebar.classList.contains("collapsed")) {
    document.querySelectorAll("#sidebar [data-bs-toggle='tooltip']").forEach(el => {
        tooltipInstances.push(new bootstrap.Tooltip(el, { trigger: "hover" }));
    });
    }
}

toggleBtn.addEventListener("click", (e) => {
    e.preventDefault();
    sidebar.classList.toggle("collapsed");
    initTooltips();
});

initTooltips();

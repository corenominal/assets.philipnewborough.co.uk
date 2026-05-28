document.addEventListener("DOMContentLoaded", function() {
    const sidebarLinks = document.querySelectorAll("#sidebar .nav-link");
    sidebarLinks.forEach(link => {
        if (link.getAttribute("href") === "/admin/bootstrap-demo") {
            link.classList.add("active");
        }
    });

    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
        new bootstrap.Tooltip(el);
    });

    document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
        new bootstrap.Popover(el);
    });

    document.getElementById("showToastBtn").addEventListener("click", function() {
        new bootstrap.Toast(document.getElementById("demoToast"), { delay: 5000 }).show();
    });
});

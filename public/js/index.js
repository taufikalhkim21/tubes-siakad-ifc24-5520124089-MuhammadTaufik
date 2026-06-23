document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById('sidebarToggle');
    const side = document.getElementById('sidebar');

    if (!btn || !side) return;

    btn.onclick = (e) => {
        side.classList.toggle('show');
        e.stopPropagation();
    };

    document.onclick = (e) => {
        if (!side.contains(e.target) && !btn.contains(e.target)) {
            side.classList.remove('show');
        }
    };
});
const sidebar = document.getElementById('sidebar');
const topbar = document.getElementById('topbar');
const mainContent = document.getElementById('mainContent');
const overlay = document.getElementById('sidebarOverlay');
const topbarBrand = document.getElementById('topbarBrand');
const toggleBtn = document.getElementById('toggleSidebar');

const isMobile = () => window.innerWidth < 992;

// Desktop: sidebar open by default
let desktopOpen = true;

function setSidebarState(open) {
    if (isMobile()) {
        sidebar.classList.toggle('open', open);
        overlay.classList.toggle('active', open);
    } else {
        desktopOpen = open;
        sidebar.classList.toggle('collapsed', !open);
        topbar.classList.toggle('expanded', !open);
        mainContent.classList.toggle('expanded', !open);
        topbarBrand.classList.toggle('visible', !open);
    }
}

toggleBtn.addEventListener('click', () => {
    if (isMobile()) {
        setSidebarState(!sidebar.classList.contains('open'));
    } else {
        setSidebarState(!desktopOpen);
    }
});

overlay.addEventListener('click', () => setSidebarState(false));

window.addEventListener('resize', () => {
    if (!isMobile()) {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
        setSidebarState(desktopOpen);
    }
});

// Mark active link
const currentPath = window.location.pathname;
document.querySelectorAll('.sidebar-item').forEach(link => {
    const href = link.getAttribute('href');
    if (href && currentPath.startsWith(href) && href !== '/') {
        link.classList.add('active');
    }
});

(function () {
    const toggles = document.querySelectorAll('.sidebar-group-toggle');
    const currentPath = window.location.pathname;

    toggles.forEach(btn => {
        const groupId = btn.dataset.group;
        const submenu = document.getElementById('submenu-' + groupId);
        const links = submenu.querySelectorAll('a.sidebar-item');

        // Marcar link activo y abrir el grupo correspondiente automáticamente
        let hasActive = false;
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (href && href !== '/' && currentPath.startsWith(href)) {
                link.classList.add('active');
                hasActive = true;
            }
        });

        if (hasActive) {
            btn.classList.add('open');
            submenu.classList.add('open');
        }

        // Click: comportamiento acordeón
        btn.addEventListener('click', () => {
            const isAlreadyOpen = submenu.classList.contains('open');

            // Cerrar todos los grupos
            toggles.forEach(otherBtn => {
                const og = otherBtn.dataset.group;
                const os = document.getElementById('submenu-' + og);
                otherBtn.classList.remove('open');
                os.classList.remove('open');
            });

            // Abrir este si estaba cerrado
            if (!isAlreadyOpen) {
                btn.classList.add('open');
                submenu.classList.add('open');
            }
        });
    });
})();
<script>
    const navLinks = Array.from(document.querySelectorAll('[data-nav-link]'));
    const dashboardLinks = Array.from(document.querySelectorAll('[data-dashboard-link]'));
    const adminSections = Array.from(document.querySelectorAll('[data-admin-section]'));

    function setActiveSection(id) {
        adminSections.forEach((section) => {
            section.classList.toggle('is-active', section.id === id);
        });

        navLinks.forEach((link) => {
            link.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
        });

        dashboardLinks.forEach((link) => {
            link.classList.toggle('is-active', link.getAttribute('href') === `#${id}`);
        });

        if (window.location.hash !== `#${id}`) {
            history.replaceState(null, '', `#${id}`);
        }
    }

    [...navLinks, ...dashboardLinks].forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href')?.replace('#', '');
            if (!id || !document.getElementById(id)) {
                return;
            }

            event.preventDefault();
            setActiveSection(id);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    const initialSection = window.location.hash?.replace('#', '') || 'projetos';
    setActiveSection(document.getElementById(initialSection) ? initialSection : 'projetos');

    document.querySelectorAll('[data-draft-form]').forEach((form) => {
        const storageKey = `admin-draft:${form.dataset.draftForm}`;
        const fields = form.querySelectorAll('[data-draft-field]');
        const storedDraft = JSON.parse(localStorage.getItem(storageKey) || '{}');

        fields.forEach((field) => {
            if (!field.value && storedDraft[field.name]) {
                field.value = storedDraft[field.name];
            }

            field.addEventListener('input', () => {
                const data = {};
                fields.forEach((item) => {
                    data[item.name] = item.value;
                });
                localStorage.setItem(storageKey, JSON.stringify(data));
            });
        });

        form.addEventListener('submit', () => {
            localStorage.removeItem(storageKey);
        });
    });

    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', () => {
            const button = form.querySelector('button[type="submit"]');
            if (button) {
                button.disabled = true;
                button.classList.add('opacity-60', 'cursor-wait');
            }
        });
    });
</script>

<!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const topbar = document.getElementById('topbar');
            const toggleBtn = document.getElementById('toggleBtn');
            const mobileBtn = document.getElementById('mobileBtn');
            const overlay = document.getElementById('overlay');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('collapsed');
                    content.classList.toggle('full');
                    topbar.classList.toggle('full');
                });
            }

            if (mobileBtn) {
                mobileBtn.addEventListener('click', function () {
                    sidebar.classList.add('mobile-show');
                    overlay.classList.add('show');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('mobile-show');
                    overlay.classList.remove('show');
                });
            }
        });
    </script>

    @yield('scripts')
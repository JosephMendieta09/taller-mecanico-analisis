/* =============================================================
   EL GARAGE — Users JS
   Cubre: mostrar/ocultar contraseña en los inputs del formulario.
   ============================================================= */

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.toggle-pass').forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.dataset.target;
            const input    = document.getElementById(targetId);
            const icon     = btn.querySelector('i');

            if (!input) return;

            if (input.type === 'password') {
                input.type  = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type  = 'password';
                icon.className = 'bi bi-eye';
            }
        });
    });

});
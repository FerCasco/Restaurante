import Alpine from 'alpinejs';
import('preline')
window.Alpine = Alpine;


import toastr from 'toastr';
window.toastr = toastr;

Livewire.on('toastMessage', (message) => {
    toastr.success(message, 'Nuevo Pedido');
});

Alpine.start();

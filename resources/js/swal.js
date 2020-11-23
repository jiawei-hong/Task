import Swal from 'sweetalert2';


const Toast = Swal.mixin({
    toast: true,
    title:'操作訊息: ',
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

export const toastMsg = config => Toast.fire(config);

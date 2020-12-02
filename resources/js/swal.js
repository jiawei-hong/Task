import Swal from 'sweetalert2';


const Toast = Swal.mixin({
    toast: true,
    title:'操作訊息: ',
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
})

const deleteConfirm = text => Swal.fire({
    title: '確定要刪除嗎?',
    icon: 'warning',
    text: text,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '刪除',
    cancelButtonText: '取消'
}).then(res => res.value);

export const toastMsg = config => Toast.fire(config);
export const deleteMsg = text => deleteConfirm(text);

import Axios from 'axios';

let baseRequest = Axios.create({
    baseURL:'/api/',
});

let userRequest = Axios.create({
    baseURL:'/api/users/',
});

let adminRequest = Axios.create({
    baseURL: '/api/admin/',
});

//baseRequest
export const login = data => baseRequest.post('login',data).then(res => res.data);
export const logout = data => baseRequest.post('logout',data).then(res => res.data);

//userRequest
export const createTask = data => userRequest.post('task',data).then(res => res.data);
export const getAllTask = token => userRequest.get('task',{params:{token:token}}).then(res => res.data);
export const getTask = (id,token) => userRequest.get(`task/${id}`,{params:{token:token}}).then(res => res.data);


//adminRequest
export const getUsers = () => adminRequest.get('getUsers').then(res => res.data);
export const getTasks = () => adminRequest.get('getTasks').then(res => res.data);

import Axios from 'axios';

let baseRequest = Axios.create({
    baseURL:'/api/',
});

let userRequest = Axios.create({
    baseURL:'/api/users/',
});

//baseRequest
export const login = data => baseRequest.post('login',data).then(res => res.data);
export const logout = data => baseRequest.post('logout',data).then(res => res.data);

//userRequest
export const createTask = data => userRequest.post('task',data).then(res => res.data);


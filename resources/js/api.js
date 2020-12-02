import Axios from 'axios';

let basicRequest = Axios.create({
    baseURL: '/api/'
})

let taskRequest = Axios.create({
    baseURL: '/api/task/'
})

let userRequest = Axios.create({
    baseURL: '/api/user/'
})

export const login = data => basicRequest.post('login',data).then(res => res.data);
export const logout = data => basicRequest.post('logout',data).then(res => res.data);
export const getTasks = token => taskRequest.get('',{params:{token:token}}).then(res => res.data);
export const getTask = id => taskRequest.get(`${id}`).then(res => res.data);
export const createTask = data => taskRequest.post('',data).then(res => res.data);
export const updateTask = (id,data) => taskRequest.patch(`${id}`,data).then(res => res.data);
export const deleteTask = id => taskRequest.delete(`${id}`).then(res => res.data)
export const getUsers = () => userRequest.get('').then(res => res.data);
export const getUser = id => userRequest.get(`${id}`).then(res => res.data);
export const createUser = data => userRequest.post('',data).then(res => res.data);
export const updateUser = (id,data) => userRequest.patch(`${id}`,data).then(res => res.data);
export const deleteUser = id => userRequest.delete(`${id}`).then(res => res.data);

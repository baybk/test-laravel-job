import axios from 'axios';

export default {
  setupAdminInterceptors: () => {

      axios.interceptors.response.use(response => {
        return response;
      }, error => {
        if (error.response.status === 401) {
            window.location.href = "/";
        }
        return Promise.reject(error);
    });
  },
};
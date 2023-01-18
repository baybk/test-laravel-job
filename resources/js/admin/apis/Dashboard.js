import axios from "axios";

const Dashboard = {
    getData: () => {
        return axios.get('/dashboard', {headers: {Authorization: 'Bearer ' + localStorage.getItem("user.api_token")}});
    }
};

export default Dashboard;
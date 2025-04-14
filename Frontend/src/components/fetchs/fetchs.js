/// <reference path="../jquery-3.7.1.js" />

class AJAXFetchs {
    static url="http://localhost/CRM_app";

    //          U S E R

    static async insertUser (user) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/insertUser.php`,
                data: user
               })
        } catch (error) {
            console.log(error.status);
        }
        
    }

    static async loginUser (user) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/loginUser.php`,
                data: user
            })
            const data=JSON.parse(response);
            
            Cookies.setLoginCookies(data);

            location.href="../../app/user/getUser.html";

        } catch (error) {
            console.log(error.status);
        }
    }

    static async selectUser (user) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/selectUser.php`,
                data: user,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }

    static async selectUsers () {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/selectUsers.php`,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
            
            const data=JSON.parse(response);
            
            return data;

        } catch (error) {
            console.log(error.status);
        }
    }

    static async deleteUser () {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/deleteUser.php`,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }

    static async updateUser (user) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/user/updateUser.php`,
                data: user,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }

    //          C U S T O M E R

    static async insertCustomer (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/insertCustomer.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }

    static async selectCustomers () {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/selectCustomers.php`,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
            
            const data=JSON.parse(response);
            
            return data;

        } catch (error) {
            console.log(error.status);
        }
    }

    static async selectCustomer (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/selectCustomer.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
            const data=JSON.parse(response);
            return data;

        } catch (error) {
            console.log(error.status);
        }
    }

    static async selectCustomersByYear (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/getCustomersByYear.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
            const data=JSON.parse(response);
            return data;

        } catch (error) {
            console.log(error);
            console.log(error.status);
        }
    }

    static async getCustomerOportunities (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/getCustomerOportunities.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })

            const data=JSON.parse(response);
            return data;

        } catch (error) {
            console.log(error.status);
        }
    }

    static async deleteCustomer (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/deleteCustomer.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }

    static async updateCustomer (customer) {
        try {
            const response=await $.ajax({
                async:true,
                method:"POST",
                type:"POST",
                processData:false,
                contentType:false,
                url:`${this.url}/Backend/src/controllers/customer/updateCustomer.php`,
                data: customer,
                headers:{
                    "Authorization":`Bearer ${Cookies.getCookie("jwtToken")}`
                }
            })
        } catch (error) {
            console.log(error.status);
        }
    }
}
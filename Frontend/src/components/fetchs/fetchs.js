/// <reference path="jquery-3.7.1.js" />

class AJAXFetchs {
    static url="http://localhost/CRM_app";

    static async insertUser (user) {
        const response=await $.ajax({
        async:true,
        method:"POST",
        type:"POST",
        processData:false,
        contentType:false,
        url:`${this.url}/Backend/src/controllers/user/insertUser.php`,
        data: user
       })

       console.log(response);
    }
}
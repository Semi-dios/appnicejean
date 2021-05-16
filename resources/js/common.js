import axios from "axios"

let baseUrl = `/api`;
export default {
    data(){
        return {
            params: {
                page: 1,
                rows: 10,
                sort: "id",
                order: "asc",
                keyword: ""
              },
            fileUrl: `${baseUrl}/file/upload`,
            imageUrl: `${baseUrl}/image`
        }
    },
    methods: {
        /**
         * GET request
             * @Param url address request
             * @Param params request parameters
         * }
        */

        getData:  function(url, params = {}) {
            let queryString = getQueryString(params);
            url = queryString ? `${url}?${queryString}` : url;
            let requestUrl = `${baseUrl}/${url}`;
            let resp = this.axios.get(requestUrl);
            let result = resp["data"];
            return result;
        },

         /**
             *
                 The * { "page": 1, "rows": 10} is converted into
            * page=1&rows=10
            *
                * @Param params parameter object
                * @Return string resulting string
            *
        */
       getQueryString(params) {
           let queryStringArr = [];
           if(params && Object.keys(params).length > 0){
               Object.keys(params).forEach(Key=> {
                   let value = params[key];
                   if(Array.isArray(value)) {
                       let arrStr = value.toString();
                       let arr = arrStr.split(",");
                       arr.forEach(item=> {
                           if(item) {
                               queryStringArr.push(`${key}=${item}`);
                           }
                       });
                   }else {
                       if(value){
                           queryStringArr.push(`${key}=${value}`);
                       }
                   }
               })
           }
           return queryStringArr.join('&');
       },
        /**
           * POST submit json
           * @Param url submission address
           * @Param body to submit data json
     */

     postData: function (url , data) {
         let requestUrl = `${baseUrl}/${url}`;
         let resp = this.axios.post(requestUrl, data);
         let result = resp["data"];
         return result;
     },
     /**
           * submit Form
           * @Param url submission address
           * @Param formData form
           * @Param config request configuration
     */

     postFormData: function(
         url,
         formData,
         config = {headers: {ContentType: "application/x-www-form-urlencoded" }}
     ) {
         let requestUrl = `${baseUrl}/${url}`;
         let resp =  this.axios.post(requestUrl , formData, config);
         let result = resp["data"];
         return result;

     }


    },
}


import Model from "../model/model.js";
import DataApi from "../api/dataApi.js";

export default class ModelData {
    constructor(){
        this.model= new Model();
        this.dataApi =  new DataApi();
    }

    async GetData(name) {
        let result = null;
        await this.dataApi.fetchData(name).then((response) => {
            this.model.name = response.query;
            result = 'ok';
        }).catch((error) => {
            console.error("Error fetching data:", error);
            result = 'error';
            throw error;
        });
        return result;
    }
}
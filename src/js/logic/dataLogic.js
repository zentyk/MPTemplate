import ModelData from "../data/modelData.js";

export default class DataLogic {
    constructor() {
        this.modelData = new ModelData();
    }

    async getData(name) {
        try {
            await this.modelData.GetData(name)
                .then((e) =>{
                    if(e !== 'ok') {
                        throw new Error("Data retrieval failed");
                    } else {
                        return this.modelData.model;
                    }
                })
                .catch(error => {
                    console.error("Error in getData:", error);
                    throw error;
                })
        }
        catch (error) {
            console.error("Error fetching data:", error);
            throw error;
        }
    }
}
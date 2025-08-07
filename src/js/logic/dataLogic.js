import ModelData from "../data/modelData.js";

export default class DataLogic {
    constructor() {
        this.modelData = new ModelData();
    }

    async getData(name) {
        try {
            let task = await this.modelData.GetData(name)
                .then(done => {
                    return this.modelData.model;
                });
        } catch (error) {
            console.error("Error fetching data:", error);
            throw error;
        }
    }
}
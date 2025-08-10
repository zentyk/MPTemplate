export default class DataApi {
    async fetchData(name) {

        let res = await fetch('/api/mysql.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ query: name })
        })
        .then(response =>{
            if(!response.ok) {
                throw new Error('Error');
            }
            return response.json();
        })
        .then(response=>{
            return response.body;
        })
        .catch(error => {
            throw error;
        });

        return res;
    }
}
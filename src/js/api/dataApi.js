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
        .then(res=>{
            return res.body;
        })
        .catch(error => {
            return error;
        });

        return res;
    }
}
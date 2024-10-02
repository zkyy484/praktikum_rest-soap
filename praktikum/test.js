const express = require('express');
const axios = require('axios'); // Menggunakan axios untuk permintaan HTTP
const app = express();

app.get('/', (req, res) => {
    const url = 'https://api.coindesk.com/v1/bpi/currentprice.json';
    
    axios.get(url)
    .then(response => {
        const data = response.data;
        res.send(`
            <h1>Harga Bitcoin</h1>
            <p>USD: ${data.bpi.USD.rate}</p>
            <p>GBP: ${data.bpi.GBP.rate}</p>
            <p>EUR: ${data.bpi.EUR.rate}</p>
        `);
    })
    .catch(error => {
        console.error(error);
        res.status(500).send('Terjadi kesalahan saat mengambil data Bitcoin');
    });
});

const port = 3000;
app.listen(port, () => {
    console.log(`Server berjalan pada port ${port}`);
});

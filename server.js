const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const PORT = 3000;

app.use(cors());
app.use(bodyParser.json());

let products = [
    { id: 1, name: "Tomatoes", quantity: 50, price: 1.20 },
    { id: 2, name: "Cucumbers", quantity: 30, price: 0.80 },
    { id: 3, name: "Potatoes", quantity: 100, price: 0.50 },
    { id: 4, name: "Carrots", quantity: 75, price: 0.60 },
];

app.get('/api/products', (req, res) => {
    res.json(products);
});

app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
});



